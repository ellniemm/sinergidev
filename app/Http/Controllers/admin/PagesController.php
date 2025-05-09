<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function index()
    {

        $products_count = 0;
        $services_count = 0;
        $blogs_count = 0;
        $users_count = 0;
        $fq_count = 0;


        $latest_products = [];
        $latest_services = [];
        $latest_blogs = [];
        $latest_users = [];
        $latest_faqs = [];


        $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;


        try {
            $productsResponse = Http::get('https://sinergi.dev.ybgee.my.id/api/product', [
                'order_by' => $this->sortField,
                'sort_by' => $this->sortDirection
            ]);
            if ($productsResponse->successful()) {
                $products = $productsResponse->json()['data']['products'] ?? [];
                $products_count = $productsResponse->json()['data']['pagination']['total'] ?? 0;
                $latest_products = array_slice($products, 0, 5);
            }
        } catch (\Exception $e) {
        }


        try {
            $servicesResponse = Http::get('https://sinergi.dev.ybgee.my.id/api/service', [
                'order_by' => $this->sortField,
                'sort_by' => $this->sortDirection
            ]);
            if ($servicesResponse->successful()) {
                $services = $servicesResponse->json()['data']['services'] ?? [];
                $services_count = $servicesResponse->json()['data']['pagination']['total'] ?? 0;
                $latest_services = array_slice($services, 0, 5);
            }
        } catch (\Exception $e) {
        }


        try {
            $blogsResponse = Http::get('https://sinergi.dev.ybgee.my.id/api/blog', [
                'order_by' => $this->sortField,
                'sort_by' => $this->sortDirection
            ]);

            if ($blogsResponse->successful()) {
                $responseData = $blogsResponse->json();

                if (isset($responseData['data']['blogs'])) {
                    $blogs = $responseData['data']['blogs'] ?? [];


                    $blogs_count = $responseData['data']['blogs_total'] ?? 0;
                } else {
                    $blogs = $responseData['data'] ?? [];
                    $blogs_count = count($blogs);
                }


                $latest_blogs = collect($blogs)
                    ->sortByDesc('created_at')
                    ->take(5)
                    ->values()
                    ->all();
            }
        } catch (\Exception $e) {
        }


        try {
            if ($token) {

                $url = "https://sinergi.dev.ybgee.my.id/api/user?per_page=100&order_by=created_at&sort_by=desc&_=" . time();

                $usersResponse = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                    'Cache-Control' => 'no-cache, no-store, must-revalidate',
                    'Pragma' => 'no-cache',
                    'Expires' => '0'
                ])->get($url);

                if ($usersResponse->successful()) {
                    $responseData = $usersResponse->json();


                    \Illuminate\Support\Facades\Log::info('Raw Users API Response', [
                        'full_response' => $responseData
                    ]);

                    $users = $responseData['data']['users'] ?? [];
                    $users_count = $responseData['data']['pagination']['total'] ?? 0;
                    $latest_users = collect($users)
                        ->sortByDesc('created_at')
                        ->take(2)
                        ->values()
                        ->all();
                }
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Exception when fetching users: ' . $e->getMessage());
        }


        try {
            if ($token) {
                $faqResponse = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ])->get('https://sinergi.dev.ybgee.my.id/api/fq?per_page=2&order_by=created_at&sort_by=desc', [
                    'order_by' => $this->sortField,
                    'sort_by' => $this->sortDirection
                ]);

                $responseData = $faqResponse->json();

                if (isset($responseData['data']['fq'])) {
                    $faqs = $responseData['data']['fq'];
                    $latest_faqs = collect($faqs)
                        ->sortByDesc('created_at')
                        ->take(2)
                        ->values()
                        ->all();


                    $fq_not_replied = $responseData['data']['fq_not_replied'] ?? 0;
                    $faqs_count = $responseData['data']['pagination']['total'] ?? 0;
                }
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error fetching FQs: ' . $e->getMessage());
        }


        return view('pages.admin.dashboard', compact(
            'products_count',
            'services_count',
            'blogs_count',
            'users_count',
            'faqs_count',
            'latest_products',
            'latest_services',
            'latest_blogs',
            'latest_users',
            'latest_faqs',
            'fq_not_replied'
        ));
    }

    public function faq(Request $request)
    {
        $faqs = [];
        $pagination = [];
        $fq_not_replied = 0;
        $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;
        $currentPage = $request->query('page', 1);

        try {
            $fqResponse = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ])->get('https://sinergi.dev.ybgee.my.id/api/fq', [
                'per_page' => 10,
                'order_by' => 'created_at',
                'sort_by' => 'desc',
                'page' => $currentPage
            ]);

            if ($fqResponse->successful()) {

                $responseData = $fqResponse->json();

                if (isset($responseData['data']['fq'])) {
                    $faqs = $responseData['data']['fq'];
                    $pagination = $responseData['data']['pagination'];
                    $fq_not_replied = $responseData['data']['fq_not_replied'] ?? 0;


                    if ($pagination['current_page'] > 1) {
                        $pagination['prev_page_url'] = route('faq.index', ['page' => $pagination['current_page'] - 1]);
                    }

                    if ($pagination['current_page'] < $pagination['last_page']) {
                        $pagination['next_page_url'] = route('faq.index', ['page' => $pagination['current_page'] + 1]);
                    }
                }
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error fetching FQs: ' . $e->getMessage());
        }

        return view('pages.admin.faq.index', compact('faqs', 'pagination', 'fq_not_replied'));
    }


    public function faqDetail($fqId)
    {
        $faq = null;
        $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

        try {
            $fqDetailResponse = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ])->get("https://sinergi.dev.ybgee.my.id/api/fq/{$fqId}");

            if ($fqDetailResponse->successful()) {
                $responseData = $fqDetailResponse->json();

                if (isset($responseData['data'])) {
                    $faq = $responseData['data'];
                    if (isset($faq['message']) && !isset($faq['reply_message'])) {
                        $faq['reply_message'] = $faq['message'];
                    }
                }
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error fetching FQ detail: ' . $e->getMessage());
            return redirect()->route('admin.faq.index')->with('toast', [
                'message' => 'Failed to fetch FAQ details',
                'type' => 'error'
            ]);
        }

        return view('pages.admin.faq.detail', compact('faq'));
    }

    public function faqDelete($fqId)
    {
        $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

        try {
            $deleteResponse = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ])->delete("https://sinergi.dev.ybgee.my.id/api/fq/{$fqId}");

            if ($deleteResponse->successful()) {
                return redirect()->route('admin.faq.index')->with('toast', [
                    'message' => 'FAQ successfully deleted',
                    'type' => 'success'
                ]);
            } else {
                return redirect()->back()->with('toast', [
                    'message' => 'Failed to delete FAQ',
                    'type' => 'error'
                ]);
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error deleting FQ: ' . $e->getMessage());
            return redirect()->back()->with('toast', [
                'message' => 'An error occurred while deleting FAQ',
                'type' => 'error'
            ]);
        }
    }

    public function faqReply(Request $request, $fqId)
    {
        $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

        $validatedData = $request->validate([
            'reply_message' => 'required|string|max:1000',
            'reply_type' => 'required|in:feedback,question'
        ]);

        try {
            $endpoint = $validatedData['reply_type'] === 'feedback'
                ? "https://sinergi.dev.ybgee.my.id/api/fq/{$fqId}/feedback-response"
                : "https://sinergi.dev.ybgee.my.id/api/fq/{$fqId}/question-response";

            $replyResponse = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ])->post($endpoint, [
                'message' => $validatedData['reply_message']
            ]);

            if ($replyResponse->successful()) {
                return redirect()->route('faq.index')->with('toast', [
                    'message' => 'Reply sent successfully',
                    'type' => 'success'
                ]);
            } else {
                return redirect()->back()->with('toast', [
                    'message' => 'Failed to send reply',
                    'type' => 'error'
                ]);
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error replying to FQ: ' . $e->getMessage());
            return redirect()->back()->with('toast', [
                'message' => 'An error occurred while sending reply',
                'type' => 'error'
            ]);
        }
    }
}
