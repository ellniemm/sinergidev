@extends('pages.layouts.layout')
@section('title', (isset($blog) ? 'Edit' : 'Create') . ' Blog - Sinergi Studio')
<!-- Trumbowyg CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css">

<!-- Colors Plugin CSS -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/colors/ui/trumbowyg.colors.min.css">
<!-- Table Plugin CSS -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/table/ui/trumbowyg.table.min.css">
<!-- Emoji Plugin CSS -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/emoji/ui/trumbowyg.emoji.min.css">
<!-- Colors Plugin CSS -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/colors/ui/trumbowyg.colors.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/lineheight/trumbowyg.lineheight.min.js">
<style>
    .trumbowyg-editor p{
        line-height: 1.7;
    }
    .trumbowyg-editor h1 {
        font-size: 2em;
        font-weight: bold;
        margin: 0.67em 0;
    }

    .trumbowyg-editor h2 {
        font-size: 1.5em;
        font-weight: bold;
        margin: 0.83em 0;
    }

    .trumbowyg-editor h3 {
        font-size: 1.17em;
        font-weight: bold;
        margin: 1em 0;
    }

    .trumbowyg-editor h4 {
        font-size: 1em;
        font-weight: bold;
        margin: 1.33em 0;
    }

    .trumbowyg-editor blockquote {
        margin: 1em 40px;
        padding-left: 15px;
        border-left: 3px solid #ccc;
    }

    .trumbowyg-editor ul {
        list-style-type: disc;
        margin: 1em 0;
        padding-left: 40px;
    }

    .trumbowyg-editor ol {
        list-style-type: decimal;
        margin: 1em 0;
        padding-left: 40px;
    }

    .trumbowyg-editor li {
        display: list-item;
        margin: 0.5em 0;
        padding-bottom: 7px;
    }

    /* 🔥 Pastikan gambar sejajar dengan teks */
    .trumbowyg-editor img {
        display: inline-block;
        vertical-align: middle;
        max-width: 100%;
        height: auto;
    }

    /* 🔥 Atur paragraf yang berisi gambar */
    .trumbowyg-editor p:has(img) {
        margin: 10px 0;
        text-align: left;
        /* Default alignment */
    }

    .trumbowyg-editor table {
        width: 100%;
        table-layout: fixed;
        /* Pastikan kolom memiliki lebar tetap */
        border-collapse: collapse;
    }

    .trumbowyg-editor th,
    .trumbowyg-editor td {
        width: 50%;
        /* Pastikan kolom rata kiri-kanan */
        word-wrap: break-word;
        /* Supaya teks panjang tidak merusak layout */
        text-align: center;
        padding: 10px;
        border: 1px solid #ddd;
    }

    .trumbowyg-editor th {
        background-color: #f4f4f4;
        color: black;
    }

    /* Add this CSS */
    .trumbowyg-editor table col {
        background-color: inherit;
    }

    .trumbowyg-editor table colgroup {
        display: table-column-group;
    }

    .trumbowyg-box {
        display: flex;
        flex-direction: column;
        height: calc(100vh - 200px);
        margin: 0;
    }

    .trumbowyg-button-pane {
        position: sticky !important;
        top: 80px !important;
        z-index: 20;


    }

    .trumbowyg-button-pane .trumbowyg-button-group {
        border: none !important;
    }

    .trumbowyg-editor {
        padding-top: 10px !important;
        flex: 1;
        overflow-y: auto;
        min-height: 0 !important;
    }

    /* Mengubah warna teks di modal upload */
    .trumbowyg-modal-box {
        color: #000000 !important;
    }

    .trumbowyg-modal-box label {
        color: #000000 !important;
    }

    .trumbowyg-modal-box .trumbowyg-modal-title {
        color: #000000 !important;
    }

    /* Mengubah warna teks input file */
    .trumbowyg-modal-box input[type="file"] {
        color: #000000 !important;
    }

    /* Mengubah warna teks description */
    .trumbowyg-modal-box .trumbowyg-modal-description {
        color: #000000 !important;
    }

    .trumbowyg-dropdown {
        z-index: 30 !important;
    }

    /* Fullscreen mode */
    .trumbowyg-fullscreen {
        background: #fff;
        height: 100vh !important;
        width: 100vw !important;
        overflow: hidden !important;
    }

    .trumbowyg-fullscreen .trumbowyg-box {
        height: 100vh !important;
        width: 100vw !important;
        overflow: hidden !important;
    }

    .trumbowyg-fullscreen .trumbowyg-button-pane {
        position: relative !important;
        top: 0 !important;
        left: 0;
        width: 100%;
        z-index: 99999;
    }


    /* preview content */


    /* 
.trumbowyg-fullscreen .trumbowyg-editor,
.trumbowyg-fullscreen .trumbowyg-textarea {
    margin-top: 37px !important;    
    height: calc(100vh - 37px) !important;
    overflow: hidden !important;
    overflow-y: auto !important;
} */
</style>



@section('main')
<div class="bg-gray-50 min-h-screen justify-center">
    <div class="text-black bg-white rounded-md shadow-md mx-auto p-6 w-full max-w-7xl">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
        <h1 class="text-2xl font-bold mb-4 md:mb-0 text-center md:text-left">
            {{ isset($blog) ? 'Update' : 'Create' }} Blog Post
        </h1>
        <a href="{{ route('blog.index') }}" class="btn btn-outline btn-sm md:btn-md text-black hover:bg-gray-100 hover:text-black border-gray-300 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back
        </a>
    </div>

        
        @if(session('success'))
        <div class="alert alert-success bg-green-100 text-green-800 px-4 py-2 rounded-lg mb-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current mr-2" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-error bg-red-100 text-red-800 px-4 py-2 rounded-lg mb-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current mr-2" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('error') }}</span>
        </div>
        @endif

        <form action="{{ isset($blog) ? route('blog.update', $blog['slug']) : route('blog.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if(isset($blog))
            @method('PATCH')
            @endif

            <!-- Responsive Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Main Content Section -->
                <div class="md:col-span-3 space-y-6">
                    <div class="bg-white rounded-lg border p-4">
                        <label class="block text-sm font-medium mb-2" for="blog_name">
                            Blog Title
                        </label>
                        <input type="text" name="blog_name" id="blog_name"
                            value="{{ old('blog_name', $blog['blog_name'] ?? '') }}"
                            class="bg-white input input-bordered input-primary w-full" required>
                    </div>

                    <div class="bg-white rounded-lg border p-4">
                        <label class="block text-sm font-medium mb-2" for="blog_desc">
                            Content
                        </label>
                        <textarea name="blog_desc" id="blog_desc"
                            class="bg-white textarea textarea-primary textarea-bordered w-full min-h-[300px] md:min-h-[400px]"
                            required>{{ old('blog_desc', $blog['blog_desc'] ?? '') }}</textarea>
                    </div>
                </div>

                <!-- Sidebar Section -->
                <div class="space-y-6">
                    <div class="bg-white rounded-lg border p-4">
                        <h2 class="font-medium mb-4">Blog Settings</h2>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium mb-2" for="category_name">
                                    Category
                                </label>
                                <select name="category_name" id="category_name"
                                    class="bg-white select select-primary select-bordered w-full" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category['category_id'] }}" {{ old('category_name',
                                        $blog['category_id'] ?? '' )==$category['category_id'] ? 'selected' : '' }}>
                                        {{ $category['category_name'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-2" for="status">
                                    Status
                                </label>
                                <select name="status" id="status"
                                    class="bg-white select select-primary select-bordered w-full" required>
                                    <option value="">Select Status</option>
                                    @foreach($statuses as $status)
                                    <option value="{{ $status }}" {{ old('status', $blog['status'] ?? '' )==$status
                                        ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-2" for="blog_thumbnail">
                                    Thumbnail
                                </label>
                                <div class="border-2 border-primary rounded-lg p-4">
                                    <input type="file" name="blog_thumbnail" id="blog_thumbnail"
                                        class="bg-white file-input file-input-primary file-input-bordered w-full"
                                        accept="image/*" onchange="previewImage(this)" {{ !isset($blog) ? 'required'
                                        : '' }}>

                                    <div id="imagePreview"
                                        class="mt-4 border-t-2 border-primary pt-4 {{ isset($blog) ? '' : 'hidden' }}">
                                        <img src="{{ isset($blog) ? 'https://sinergi.dev.ybgee.my.id/img/blog/thumbnails/'.$blog['blog_thumbnail'] : '' }}"
                                            alt="Thumbnail Preview"
                                            class="w-full h-32 md:h-40 xl:h-48 object-cover rounded-lg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-2 mt-6">
                <button type="submit" class="btn {{ isset($blog) ? 'btn-warning' : 'btn-primary' }} text-white">
                    {{ isset($blog) ? 'Update' : 'Create' }} Blog
                </button>
            </div>
        </form>


    </div>

    {{-- section preview --}}
    <div class="text-black bg-white rounded-md shadow-md mx-auto w-full">
        <div class="mt-1 border rounded-lg bg-white shadow-md">
            <div class="pt-10 md:pt-28 pb-16 mx-auto text-center space-y-7">
                <h3 id="preview-title" class="text-2xl md:text-4xl 2xl:text-6xl font-bold md:w-8/12 mx-auto"></h3>
            </div>
            <div id="preview-thumbnail" class="relative w-full flex justify-center"></div>
            <div class="blog-content mx-auto md:px-72 py-10 2xl:py-20 2xl:px-[500px]">
                <div id="preview-content" class="prose max-w-none py-10"></div>
            </div>
        </div>
    </div>


</div>



</div>



<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- jQuery Resizable -->
<script src="https://rawcdn.githack.com/RickStrahl/jquery-resizable/0.35/dist/jquery-resizable.min.js"></script>
<!-- Trumbowyg -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"></script>
<!-- Resize Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/resizimg/trumbowyg.resizimg.min.js">
</script>
<!-- Plugin Clean Paste -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/cleanpaste/trumbowyg.cleanpaste.min.js">
</script>
<!-- Plugin Paste Image -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/pasteimage/trumbowyg.pasteimage.min.js">
</script>
<!-- Colors Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/colors/trumbowyg.colors.min.js"></script>
<!-- Table Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/table/trumbowyg.table.min.js"></script>
<!-- Font Size Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/fontsize/trumbowyg.fontsize.min.js">
</script>
<!-- Indent Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/indent/trumbowyg.indent.min.js"></script>
<!-- Emoji Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/emoji/trumbowyg.emoji.min.js"></script>
<!-- Upload Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/upload/trumbowyg.upload.min.js"></script>
<!-- Colors Plugin JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/colors/trumbowyg.colors.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/fontfamily/trumbowyg.fontfamily.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/history/trumbowyg.history.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/lineheight/trumbowyg.lineheight.min.js">
</script>

<script>
    $(document).ready(function () {
        if (!$.trumbowyg) {
            console.error("Trumbowyg belum dimuat!");
            return;
        }
        
        $("#blog_desc").trumbowyg({
            btnsDef: {
                image: {
                    dropdown: ["insertImage", "upload"],
                    ico: "insertImage",
                },
            },
            btns: [
                ["viewHTML"],
                ["undo", "redo"],
                ["indent", "outdent"],
                ["formatting"],
                ["lineheight", "fontsize", "fontfamily", "foreColor", "backColor"],
                ["strong", "em", "del", "underline"],
                ["superscript", "subscript"],
                ["link"],
                ["image"],
                ["justifyLeft", "justifyCenter", "justifyRight", "justifyFull"],
                ["unorderedList", "orderedList"],
                ["horizontalRule"],
                ["removeformat"],
                ["table"],
                ["tableCellBackgroundColor"],
                ["emoji"],
                ["fullscreen"],
            ],
            plugins: {
                upload: {
                    serverPath: "/upload-image", 
                    fileFieldName: "image", 
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content",
                        ),
                        Authorization: "Bearer " + getCookie("authToken"), 
                        Accept: "application/json",
                    },
                    urlPropertyName: "url", 
                    dropZone: true,
                    pasteImage: true,
                    xhrFields: {
                        withCredentials: true,
                    },
                },
    
                resizimg: { minSize: 64, step: 16 },
                table: true,
                color: {
                    allowCustom: true,
                },
                cleanPaste: {
                    keepNewLines: true,
                    removeStyles: true,
                    removeEmptyTags: true,
                },
                history: {
                    deleteInterval: 250,
                    maxStack: 100,
                    delay: 1000,
                    redoStackLimit: 50,
                    redoStateDelay: 800,
                },
            },
            semantic: true,
            removeformatPasted: true,
            pastePlain: true,
            autogrow: true,
            autogrowOnEnter: true,
            imageWidthModalEdit: true,
            defaultLinkTarget: "_blank",
            emoji: true,
            
            
            
            
            
            
            
            
            
            
            tabToIndent: true,
        });
    
        
        $(".trumbowyg-box").append(
            '<div class="word-counter">Words: <span>0</span></div>',
        );
    
        
        $("<style>")
            .text(
                `
        .word-counter {
            padding: 8px 15px;
            background: #2d3436;
            border-top: 1px solid #ddd;
            font-size: 14px;
            color: white;
        }
    `,
            )
            .appendTo("head");
    
        
        function countWords() {
            var text = $("#blog_desc").trumbowyg("html");
            var tempDiv = document.createElement("div");
            tempDiv.innerHTML = text;
    
            tempDiv
                .querySelectorAll("script, style, img")
                .forEach((el) => el.remove());
            let cleanText = tempDiv.textContent || tempDiv.innerText || "";
    
            let words = cleanText
                .replace(/[\n\r]+/g, " ")
                .replace(/\s+/g, " ")
                .match(/\b\w+\b/g);
    
            let wordCount = words ? words.length : 0;
            $(".word-counter span").text(wordCount);
        }
    
        
        countWords();
    
        
        $("#blog_desc").on("tbwchange tbwpaste input keyup", countWords);
    
        function wrapAndAlignImages() {
            $("#blog_desc img").each(function () {
                let img = $(this);
                let parent = img.parent();
    
                if (!parent.is("p")) {
                    img.wrap('<p style="text-align: left;"></p>');
                } else if (!parent.attr("style")) {
                    parent.attr("style", "text-align: left;");
                }
            });
        }
    
        function fixImageAlignment() {
            $("#blog_desc p:has(img)").each(function () {
                let p = $(this);
                if (!p.attr("style")) {
                    p.css("text-align", "left");
                }
            });
        }
    
        $("#blog_desc").on("tbwimageupload", function () {
            setTimeout(wrapAndAlignImages, 100);
        });
        const initialContent = $("#blog_desc").trumbowyg("html");
        const initialTitle = $("#blog_name").val();
        const initialThumbnail = $("#imagePreview img").attr("src");
    
        $("#preview-title").text(initialTitle);
        $("#preview-content").html(initialContent);
        if (initialThumbnail) {
            $("#preview-thumbnail").html(`
                <img src="${initialThumbnail}" 
                    class="rounded-xl md:rounded-3xl w-[300px] h-[150px] md:w-[800px] md:h-[400px] 2xl:w-[1000px] 2xl:h-[500px] mt-10 2xl:mt-20 z-10 object-cover"
                >
            `);
        }
        const previewStyles = `
    <style>
    .blog-content p {
            line-height: 1.7;
        }
        .blog-content h1 {
            font-size: 2em;
            font-weight: bold;
            margin: 0.67em 0;
        }
    
        .blog-content h2 {
            font-size: 1.5em;
            font-weight: bold;
            margin: 0.83em 0;
        }
        
        .blog-content h3 {
            font-size: 1.17em;
            font-weight: bold;
            margin: 1em 0;
        }
        
        .blog-content blockquote {
            margin: 1em 40px;
            padding-left: 15px;
            border-left: 3px solid #ccc;
        }
        .blog-content ul {
            list-style-type: disc;
            margin: 1em 0;
            padding-left: 40px;
        }
        
        .blog-content ol {
            list-style-type: decimal;
            margin: 1em 0;
            padding-left: 40px;
        }
        
        .blog-content li {
            display: list-item;
            margin: 0.5em 0;
            padding-bottom: 7px;
        }
    
        
        .blog-content img {
            display: inline-block;
            vertical-align: middle;
            max-width: 100%;
            height: auto;
        }
        
        .blog-content table {
            width: 100%;
            border-collapse: collapse;
        }
    
        .blog-content th,
        .blog-content td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        </style>
        `;
        
        $("head").append(previewStyles);
    
        
        $("#blog_name").on("input", function () {
            $("#preview-title").text($(this).val());
        });
        $("#editor")
            .trumbowyg({
                autogrow: true,
            })
            .on("tbwpaste tbwchange", function () {
                var content = $(this).trumbowyg("html");
    
                $('img[src^="data:image"]', content).each(function () {
                    let img = $(this);
                    let base64Data = img.attr("src");
    
                    let blobURL = base64ToBlobURL(base64Data);
                    img.attr("src", blobURL); 
                });
            });
    
        $("#blog_desc").on("tbwchange tbwpaste input keyup", function () {
            wrapAndAlignImages();
            fixImageAlignment();
            fixTableStyles();
            $("#preview-content").html($(this).trumbowyg("html"));
        });
    
        function applyAlignment(alignment) {
            let selection = document.getSelection();
            if (!selection.rangeCount) return;
    
            let range = selection.getRangeAt(0);
            let parent = $(range.commonAncestorContainer).closest("p");
    
            if (parent.length) {
                parent.css("text-align", alignment);
            }
        }
    
        function fixTableStyles() {
            $(".trumbowyg-editor table")
                .css({

                    width: "100%",
                    "border-collapse": "collapse",
                })
                .each(function () {
                    
                    if (!$(this).find("colgroup").length) {
                        var colCount = $(this).find(
                            "tr:first td, tr:first th",
                        ).length;
                        var colgroup = $("<colgroup>");
                        for (var i = 0; i < colCount; i++) {
                            colgroup.append($("<col>"));
                        }
                        $(this).prepend(colgroup);
                    }
                });
        }
    
        $(".trumbowyg-button-group").on("click", "button", function () {
            let buttonClass = $(this).attr("class");
    
            if (buttonClass.includes("trumbowyg-justifyLeft-button")) {
                applyAlignment("left");
            } else if (buttonClass.includes("trumbowyg-justifyCenter-button")) {
                applyAlignment("center");
            } else if (buttonClass.includes("trumbowyg-justifyRight-button")) {
                applyAlignment("right");
            } else if (buttonClass.includes("trumbowyg-justifyFull-button")) {
                applyAlignment("justify");
            }
        });
    });
    
    function previewImage(input) {
        const preview = document.getElementById("imagePreview");
        const previewBlog = document.getElementById("preview-thumbnail");
        let image = preview.querySelector("img");
    
        if (input.files && input.files[0]) {
            const reader = new FileReader();
    
            reader.onload = function (e) {
                
                if (!image) {
                    image = document.createElement("img");
                    image.id = "previewImg";
                    image.className =
                        "max-w-[250px] h-auto object-cover rounded-lg mx-auto";
                    preview.appendChild(image);
                }
                image.src = e.target.result;
                preview.classList.remove("hidden");
    
                
                previewBlog.innerHTML = `
                    <img src="${e.target.result}" 
                        class="rounded-xl md:rounded-3xl w-[300px] h-[150px] md:w-[800px] md:h-[400px] 2xl:w-[1000px] 2xl:h-[500px] mt-12 2xl:mt-20 z-10 object-cover"
                    >
                `;
            };
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(";").shift();
    }
    
</script>
@endsection