$(function () {
    $("form.delete-btn").on("submit", function (event) {
        event.preventDefault();

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit();
            }
        });
    });

    $("form.action_btn").on("submit", function (event) {
        event.preventDefault();

        let msg = event.target.dataset.message
            ? event.target.dataset.message
            : "Are you sure?";

        Swal.fire({
            title: msg,
            // text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit();
            }
        });
    });

    $(".image-preview-container input").on("change", function (event) {
        let output = $(this)
            .parent("div")
            .parent(".image-preview-container")
            .find("img");

        let reader = new FileReader();
        reader.onload = function () {
            output.attr("src", reader.result);
        };

        reader.readAsDataURL(event.target.files[0]);
    });

    $(".dropify").dropify();

    let sideIsDisplayed = true;

    $("#sidebar-toggle").on("click", function () {
        if (sideIsDisplayed) {
            $("#sidebarMenu ").css({
                width: "0px",
            });

            $(".content ").css({
                marginLeft: "0px",
            });

            sideIsDisplayed = false;
        } else {
            $(".content ").css({
                marginLeft: "260px",
            });
            $("#sidebarMenu ").css({
                width: "100%",
            });

            sideIsDisplayed = true;
        }
    });

    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // setTimeout(function(){
    //     $('.loader-container').fadeOut(500)

    // },500)
});

export const HidePreLoader = function () {
    $(".loader-container").fadeOut(1000);
};
