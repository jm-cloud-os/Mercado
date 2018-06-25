<script src="{{ asset('public/js/libraries/jquery/dist/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('public/js/vendor.js') }}"></script>
<script src="{{ asset('public/js/bundle.js') }}"></script>
<script src="{{ asset('public/js/libraries/jquery.autocomplete.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

<script type="text/javascript">
$(function () {
        
    jQuery('.summernote').summernote({
        placeholder: "Start writing",
        height: 250,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['media', ['link', 'picture', 'hr']],
            ['tools', ['fullscreen']]
        ]
    });

    jQuery(document).ready(function ($) {
        $("tr.row-hover").click(function () {
            window.location = $(this).data("href");
        });
    });

    var top = 18;
    $(window).scroll(function () {
        var y = $(this).scrollTop();
        var button = $('#floating-buttons');
        if (y >= top) {
            button.css({
                'position': 'fixed',
                'top': '80px',
                'right': '35px'
            });
        } else {
            button.removeAttr('style')
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
</script>

@stack('scripts')