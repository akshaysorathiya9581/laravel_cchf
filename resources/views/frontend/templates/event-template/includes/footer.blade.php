

 <!-- All JavaScript files
================================================== -->

{{-- <script src="{{ asset('assets/frontend/templates/raffle/js/jquery-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/templates/raffle/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/templates/raffle/js/swiper-bundle.min.js') }}" type="module"></script>
 <script src="{{ asset('assets/frontend/templates/raffle/js/ua-parser.js') }}"></script>
<script src="{{ asset('assets/frontend/templates/raffle/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/frontend/templates/raffle/js/hint-css.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.3"></script> --}}


<script src="{{ asset('assets/frontend/templates/event/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/templates/event/assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- Plugins for this template -->
<script src="{{ asset('assets/frontend/templates/event/assets/js/jquery-plugin-collection.js') }}"></script>
<!-- Custom script for this template -->
<script src="{{ asset('assets/frontend/templates/event/assets/js/script.js') }}"></script>

<script src="{{ asset('assets/frontend/templates/event/assets/js/custom.js') }}"></script>



<script type="text/javascript">
    function updateCart() {
        $.post("/checkout-cart.php", {
                action: 'ViewCart'
            },
            function(cartData) {
                $("#mini-cart").html(cartData);
            }
        );
    }

    //Copy to Clipboard
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).val()).select();
        document.execCommand("copy");
        $temp.remove();

        $("#copyAlert").text("Link copied to clipboard!");
        $("#copyAlert").show();
        setTimeout(function() {
            $("#copyAlert").hide();
        }, 3000);
    }

    $("#pac-input").on('keyup change click', function() {
        $("#pac-input").focus();
    });

    setTimeout(function() {
        updateCart();
    }, 1000);
</script>


</body>

</html>
<script>
/*const h1s = document.querySelectorAll('h1.group-name');
    const result = Array.from(h1s).map(h1 => ({ id: h1.id, content: h1.textContent }));

    var ulElement = document.querySelector('.banner-list');*/

// Iterate over the array and append each item as a li to the ul
// result.forEach(function(item) {
//     var liElement = document.createElement('li');
//     liElement.innerHTML = `<a href="#${item.id}">${item.content}</a>`;
//     ulElement.appendChild(liElement);
// });


// Find the h1 element with id="grp-6"
/*let h1Element = document.querySelector('h1#grp-6');

// Find the div with id="package-container"
let container = document.querySelector('#package-container');

// If the h1 element is found
if (h1Element) {
    // Get the next sibling div element before moving the h1
    let nextDiv = h1Element.nextElementSibling;

    // If the container is found, move the h1 element to the container
    if (container) {
        container.appendChild(h1Element);
    }

    // Check if the next sibling is a div and move it to the container
    if (nextDiv && nextDiv.tagName === 'DIV' && container) {
        container.appendChild(nextDiv);
        $(nextDiv).addClass('package-card')
        $(nextDiv).removeClass('col-md-6');
        $(nextDiv).removeClass('col-sm-6');

    }
}*/
</script>




