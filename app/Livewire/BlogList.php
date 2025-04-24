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

    public $selectedCategory = 'all';
    public $categories = [];
    public $isFiltering = false;

    public function mount()
    {
        // fetch default 1 bigCard 6 gridCard
        $this->limit = 7;
        $this->fetchCategories();
        $this->fetchBlogs();
    }

    public function fetchCategories()
    {
        try {
            // Use the correct API endpoint for categories
            $response = Http::get('https://sinergi.dev.ybgee.my.id/api/category');
            
            if ($response->successful()) {
                $data = $response->json();
                
                // Correct data structure handling
                if (isset($data['data']) && is_array($data['data'])) {
                    $this->categories = $data['data'];
                    Log::info('Categories fetched successfully', ['count' => count($this->categories)]);
                } else {
                    Log::info('Categories data structure unexpected', ['response' => $data]);
                }
            } else {
                Log::info('Categories fetch failed', ['status' => $response->status()]);
            }
        } catch (\Exception $e) {
            Log::error('Categories fetch exception', ['message' => $e->getMessage()]);
        }
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
            
            // Tambahkan parameter category jika sedang dalam mode filtering
            if ($this->selectedCategory !== 'all') {
                $params['category'] = $this->selectedCategory;
            }
            
            // Kirim request ke API dengan parameter yang sudah disiapkan
            $response = Http::get('https://sinergi.dev.ybgee.my.id/api/blog', $params);
            
            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['data']['blogs']) && is_array($data['data']['blogs'])) {
                    $newBlogs = $data['data']['blogs'];
                    Log::info('Blogs fetched successfully', [
                        'count' => count($newBlogs),
                        'params' => $params
                    ]);
                    
                    if ($this->isSearching || $this->selectedCategory !== 'all') {
                        // Jika sedang dalam mode pencarian atau filtering
                        if ($this->initialFetch) {
                            // Reset data jika ini adalah pencarian/filtering pertama
                            $this->blogs = $newBlogs;
                            $this->bigCard = null; // Tidak ada bigCard dalam mode pencarian/filtering
                            $this->gridCard = $newBlogs; // Semua hasil ditampilkan sebagai gridCard
                            $this->initialFetch = false;
                        } else {
                            // Jika ini adalah load more dalam mode pencarian/filtering
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
        // Validasi: jika searchTerm dan category keduanya kosong, tidak melakukan apa-apa
        if (empty($this->searchTerm) && $this->selectedCategory === 'all') {
            return;
        }
        
        // Reset data
        $this->blogs = [];
        $this->gridCard = [];
        $this->bigCard = null;
        $this->offset = 0;
        $this->isSearching = !empty($this->searchTerm);
        $this->initialFetch = true;
        
        // Fetch blogs dengan parameter search dan/atau category
        $this->fetchBlogs();
    }

    // Method untuk reset semua filter dan pencarian
    public function resetSearch()
    {
        $this->searchTerm = '';
        $this->isSearching = false;
        $this->selectedCategory = 'all';
        $this->isFiltering = false;
         
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
