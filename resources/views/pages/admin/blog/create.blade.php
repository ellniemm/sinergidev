@extends('pages.layouts.layout')
@section('title', 'Create Blog')

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
<style>
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
        margin: 0;
    }

    .trumbowyg-button-pane {
        position: sticky !important;
        top: 0 !important;


    }

    .trumbowyg-button-pane .trumbowyg-button-group {
        border: none !important;
    }

    .trumbowyg-editor {
        padding-top: 10px !important;
    }
</style>



@section('main')
<div class="bg-gray-50 min-h-screen flex justify-center">
    <div class="text-black bg-white rounded-md shadow-md mx-auto p-6 w-full max-w-7xl">
        <h1 class="text-2xl font-bold mb-6 text-center md:text-left">
            {{ isset($blog) ? 'Update' : 'Create' }} Blog Post
        </h1>

        <!-- Alert Messages -->
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
                                        <img src="{{ isset($blog) ? 'https://sinergi.dev.ybgee.my.id/img/blog/'.$blog['blog_thumbnail'] : '' }}"
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
                <a href="{{ route('blog.index') }}" class="btn btn-ghost">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    {{ isset($blog) ? 'Update' : 'Create' }} Blog
                </button>
            </div>
        </form>
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

<script>
    $(document).ready(function () {
if (!$.trumbowyg) {
    console.error("Trumbowyg belum dimuat!");
    return;
}
    // Initialize Trumbowyg
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
            ["fontsize"],
            ["strong", "em", "del" , "underline"],
            ["superscript", "subscript"],
            ["link"],
            ["image"],
            ["justifyLeft", "justifyCenter", "justifyRight", "justifyFull"],
            ["unorderedList", "orderedList"],
            ["horizontalRule"],
            ["removeformat"],
            ["foreColor", "backColor"],
            ["table"],
            ["tableCellBackgroundColor"],
            ["emoji"],
        ],
        plugins: {
    //         upload: {
    //     serverPath: '/upload/image',
    //     fileFieldName: 'image',
    //     data: [
    //         {name: '_token', value: $('input[name="_token"]').val()}
    //     ],
    //     urlPropertyName: 'url',
    //     dropZone: true,
    //     pasteImage: true
    // }

            resizimg: { minSize: 64, step: 16 },
            fontsize: {
                sizeList: ["12px", "14px", "16px", "18px", "20px", "24px", "28px"],
            },
            table: true,
            color: {
                allowCustom: true,
            },
            cleanPaste: {
                keepNewLines: true,
                removeStyles: true,
                removeEmptyTags: true,
            }
        },
        semantic: true,
        removeformatPasted: true,
        pastePlain: true,
        autogrow: true,
        autogrowOnEnter: true,
        imageWidthModalEdit: true,
        defaultLinkTarget: "_blank",
        emoji: true,
        // upload: {
        //     serverPath: "/upload-image",
        //     fileFieldName: "image",
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     urlPropertyName: "url",
        //     dropZone: true,
        //     pasteImage: true,
        // },
        tabToIndent: true,
    });
    
// Add word counter
$(".trumbowyg-box").append(
    '<div class="word-counter">Words: <span>0</span></div>'
);

// Add counter styles
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
`
    )
    .appendTo("head");

// Initial word count
function countWords() {
    var text = $("#blog_desc").trumbowyg("html");
    var tempDiv = document.createElement("div");
    tempDiv.innerHTML = text;

    tempDiv.querySelectorAll("script, style, img").forEach((el) => el.remove());
    let cleanText = tempDiv.textContent || tempDiv.innerText || "";

    let words = cleanText
    .replace(/[\n\r]+/g, " ")
    .replace(/\s+/g, " ")
    .match(/\b\w+\b/g);

    let wordCount = words ? words.length : 0;
    $(".word-counter span").text(wordCount);
}

// Count words on load
countWords();

// Count words on changes
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

$("#blog_desc").on("tbwchange tbwpaste input keyup", function () {
    wrapAndAlignImages();
    fixImageAlignment();
    fixTableStyles();
//     var content = $(this).trumbowyg('html');
// $('img[src^="data:image"]', content).each(function() {
//     var base64Data = $(this).attr('src');
//     $.ajax({
//         url: '/convert-base64',
//         method: 'POST',
//         data: {
//             image: base64Data,
//             _token: $('input[name="_token"]').val()
//         },
//         success: function(response) {
//             $(this).attr('src', response.url);
//         }
//     });
// });
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
        // Add colgroup if not exists
        if (!$(this).find("colgroup").length) {
        var colCount = $(this).find("tr:first td, tr:first th").length;
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
    const preview = document.getElementById('imagePreview');
    const image = preview.querySelector('img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            image.src = e.target.result;
            preview.classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

</script>
@endsection