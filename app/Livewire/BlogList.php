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
    public $initialFetch = true;

    public $searchTerm = '';
    public $isSearching = false;

    public $selectedCategory = 'all';
    public $categories = [];
    public $isFiltering = false;

    public function mount()
    {
    
        $this->limit = 7;
        $this->fetchCategories();
        $this->fetchBlogs();
    }

    public function fetchCategories()
    {
        try {
            
            $response = Http::get('https://sinergi.dev.ybgee.my.id/api/category');
            
            if ($response->successful()) {
                $data = $response->json();
                
                
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
            
            $calculatedOffset = 0;
            if (!$this->initialFetch) {
                
                $calculatedOffset = count($this->blogs);
            }
            
        
            $params = [
                'offset' => $calculatedOffset,
                'limit' => $this->limit
            ];
            
            
            if ($this->isSearching && !empty($this->searchTerm)) {
                $params['search'] = $this->searchTerm;
            }
            
            
            if ($this->selectedCategory !== 'all') {
                $params['category'] = $this->selectedCategory;
            }
            
            
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
                        
                        if ($this->initialFetch) {
                            
                            $this->blogs = $newBlogs;
                            $this->bigCard = null; 
                            $this->gridCard = $newBlogs; 
                            $this->initialFetch = false;
                        } else {
                            
                            $this->blogs = array_merge($this->blogs, $newBlogs);
                            $this->gridCard = array_merge($this->gridCard, $newBlogs);
                        }
                    } else if ($this->initialFetch) {
                        
                        $this->blogs = $newBlogs;
                        $this->bigCard = !empty($this->blogs) ? $this->blogs[0] : null;
                        $this->gridCard = array_slice($this->blogs, 1);
                        $this->limit = 6;
                        $this->initialFetch = false;
                    } else {
                        
                        $this->blogs = array_merge($this->blogs, $newBlogs);
                        $this->gridCard = array_merge($this->gridCard, $newBlogs);
                    }
                    
                    
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


    public function search()
    {
    
        if (empty($this->searchTerm) && $this->selectedCategory === 'all') {
            return;
        }
        
    
        $this->blogs = [];
        $this->gridCard = [];
        $this->bigCard = null;
        $this->offset = 0;
        $this->isSearching = !empty($this->searchTerm);
        $this->initialFetch = true;
        
    
        $this->fetchBlogs();
    }


    public function resetSearch()
    {
        $this->searchTerm = '';
        $this->isSearching = false;
        $this->selectedCategory = 'all';
        $this->isFiltering = false;
         
    
        $this->blogs = [];
        $this->gridCard = [];
        $this->bigCard = null;
        $this->offset = 0;
        $this->initialFetch = true;
        $this->limit = 7;
         
    
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
