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

    public $searchTerm = '';
    public $isSearching = false;

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
            // Hitung offset yang benar berdasarkan jumlah data yang sudah diambil
            $calculatedOffset = 0;
            if (!$this->initialFetch) {
                // Jika bukan fetch pertama, offset seharusnya = jumlah data yang sudah diambil
                $calculatedOffset = count($this->blogs);
            }
            
            // Parameter dasar untuk request API
            $params = [
                'offset' => $calculatedOffset,
                'limit' => $this->limit
            ];
            
            // Tambahkan parameter search jika sedang dalam mode pencarian
            if ($this->isSearching && !empty($this->searchTerm)) {
                $params['search'] = $this->searchTerm;
            }
            
            // Kirim request ke API dengan parameter yang sudah disiapkan
            $response = Http::get('https://sinergi.dev.ybgee.my.id/api/blog', $params);
            
            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['data']['blogs']) && is_array($data['data']['blogs'])) {
                    $newBlogs = $data['data']['blogs'];
                    
                    if ($this->isSearching) {
                        // Jika sedang dalam mode pencarian
                        if ($this->initialFetch) {
                            // Reset data jika ini adalah pencarian pertama
                            $this->blogs = $newBlogs;
                            $this->bigCard = null; // Tidak ada bigCard dalam mode pencarian
                            $this->gridCard = $newBlogs; // Semua hasil ditampilkan sebagai gridCard
                            $this->initialFetch = false;
                        } else {
                            // Jika ini adalah load more dalam mode pencarian
                            $this->blogs = array_merge($this->blogs, $newBlogs);
                            $this->gridCard = array_merge($this->gridCard, $newBlogs);
                        }
                    } else if ($this->initialFetch) {
                        // Ini adalah fetch pertama (normal mode)
                        $this->blogs = $newBlogs;
                        $this->bigCard = !empty($this->blogs) ? $this->blogs[0] : null;
                        $this->gridCard = array_slice($this->blogs, 1);
                        $this->limit = 6;
                        $this->initialFetch = false;
                    } else {
                        // Ini adalah fetch "Load More" (normal mode)
                        $this->blogs = array_merge($this->blogs, $newBlogs);
                        $this->gridCard = array_merge($this->gridCard, $newBlogs);
                    }
                    
                    // Cek apakah masih ada blog yang belum ditampilkan
                    $this->hasMoreBlog = isset($data['data']['has_more']) ? $data['data']['has_more'] : false;
                }
            }
        } catch (\Exception $e) {
            Log::error('BlogList Livewire - Exception', [
                'message' => $e->getMessage()
            ]);
        }

        $this->isLoading = false;
    }


     // Method untuk memulai pencarian
     public function search()
     {
         // Reset data
         $this->blogs = [];
         $this->gridCard = [];
         $this->bigCard = null;
         $this->offset = 0;
         $this->isSearching = true;
         $this->initialFetch = true;
         
         // Fetch blogs dengan parameter search
         $this->fetchBlogs();
     }
     
     // Method untuk mereset pencarian
     public function resetSearch()
     {
         $this->searchTerm = '';
         $this->isSearching = false;
         
         // Reset semua data dan fetch ulang dari awal
         $this->blogs = [];
         $this->gridCard = [];
         $this->bigCard = null;
         $this->offset = 0;
         $this->initialFetch = true; // Penting! Ini akan memastikan data diproses sebagai fetch pertama
         $this->limit = 7; // Mengambil 7 data (1 untuk bigCard, 6 untuk gridCard)
         
         // Fetch ulang semua data
         $this->fetchBlogs();
     }
     
 
     public function loadMore()
     {
         if ($this->hasMoreBlog) {
             $this->fetchBlogs();
         }
     }
 
    public function render()
    {
        return view('livewire.blog-list');
    }
}
