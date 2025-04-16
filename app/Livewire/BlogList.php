<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class BlogList extends Component
{
    public $blogs = [];
    public $bigCard = null;
    public $gridCard = [];
    public $offset = 0;
    public $limit = 6;
    public $hasMoreBlog = false;
    public $isLoading = true;
    public $initialFetch = true; // Flag untuk fetch pertama

    public function mount()
    {
        // fetch default 1 bigCard 6 gridCard
        $this->limit = 7;
        $this->fetchBlogs();
    }

    public function fetchBlogs()
    {
        $this->isLoading = true;

        try {
            // Hitung offset berdasarkan jumlah data yang  diambil
            $calculatedOffset = 0;
            if (!$this->initialFetch) {
                // Jika bukan fetch pertama, offset seharusnya = jumlah data yang diambil
                $calculatedOffset = count($this->blogs);
            }
            
            $response = Http::get('https://sinergi.dev.ybgee.my.id/api/blog', [
                'offset' => $calculatedOffset,
                'limit' => $this->limit
            ]);
            
            // Log response details
            Log::info('BlogList Livewire - API Response', [
                'status' => $response->status(),
                'successful' => $response->successful(),
                'calculatedOffset' => $calculatedOffset,
                'limit' => $this->limit,
                'initialFetch' => $this->initialFetch
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['data']['blogs']) && is_array($data['data']['blogs'])) {
                    $newBlogs = $data['data']['blogs'];
                    
                    if ($this->initialFetch) {
                        //  fetch pertama
                        $this->blogs = $newBlogs;
                        
                        // Set bigCard dari data pertama
                        $this->bigCard = !empty($this->blogs) ? $this->blogs[0] : null;
                        
                        // Set gridCard dari data 2-7
                        $this->gridCard = array_slice($this->blogs, 1);
                        
                        // Setelah fetch pertama, ubah limit menjadi 6 untuk  berikutnya
                        $this->limit = 6;
                        $this->initialFetch = false;
                    } else {
                        //  fetch "Load More"
                        //  data baru ke array blogs yang sudah ada
                        $this->blogs = array_merge($this->blogs, $newBlogs);
                        
                        // Update gridCard dengan menambahkan data baru
                        $this->gridCard = array_merge($this->gridCard, $newBlogs);
                    }
                    
                    // Cek apakah masih ada blog yang belum tampil
                    $this->hasMoreBlog = isset($data['data']['has_more']) ? $data['data']['has_more'] : false;
                } else {
                    Log::error('BlogList Livewire - Unexpected data structure', [
                        'data' => $data
                    ]);
                }
            } else {
                Log::error('BlogList Livewire - API error', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
            }
        } catch (\Exception $e) {
            Log::error('BlogList Livewire - Exception', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
        }

        $this->isLoading = false;
    }

    public function loadMore()
    {
        if ($this->hasMoreBlog) {
            // Tidak perlu increment offset soale dihitung berdasarkan jumlah data yang diambil
            $this->fetchBlogs();
        }
    }

    public function render()
    {
        return view('livewire.blog-list');
    }
}
