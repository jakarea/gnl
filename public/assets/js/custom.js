// Toggle menu when 'menuToggle' is clicked
document.getElementById('menuToggle').addEventListener('click', function (e) {
    e.preventDefault();
    const sidebarWrap = document.querySelector('.sidebar-wrap');
    sidebarWrap.classList.toggle('show');
    e.stopPropagation(); // Stop the click event from propagating further
});

// Hide menu when clicking anywhere on the page except the menu
document.body.addEventListener('click', function (e) {
    const sidebarWrap = document.querySelector('.sidebar-wrap');
    const menuToggle = document.getElementById('menuToggle');

    // Check if the click is outside the '.sidebar-wrap' and not on 'menuToggle'
    if (!sidebarWrap.contains(e.target) && e.target !== menuToggle) {
        sidebarWrap.classList.remove('show');
    }
});


const notifyButton = document.getElementById('notifyButton');
const notifyList = document.getElementById('notifyList');

document.addEventListener('click', (event) => {
    if (!notifyButton.contains(event.target) && !notifyList.contains(event.target)) {
        notifyList.classList.remove('show');
        notifyButton.classList.remove('active');
    } else {
        notifyList.classList.toggle('show');
        notifyButton.classList.toggle('active');
    }
});



$(document).ready(function () {
    $('.net_amount').on('input', function () {
        var amount = $(this).val();
        if (amount !== '') {
            var taxAmount = (parseFloat(amount) * 0.21).toFixed(2);
            $('.tax_calculate').val(taxAmount);
        } else {
            $('.tax_calculate').val('');
        }
    });
});

$(document).ready(function () {

    $('.payment-type-bttn').on('click', function () {
        var paymentType = $(this).data('type');
        $('#pay_type').val(paymentType);
        togglePaymentStatus();
    });

    function togglePaymentStatus() {
        var paymentType = $('#pay_type').val();

        if (paymentType === 'one_time') {
            $('.removePayStatus').show();
            $(".serviceCol12").removeClass('col-xl-12').addClass('col-xl-6');
        } else {
            $('.removePayStatus').hide();
            $(".serviceCol12").removeClass('col-xl-6').addClass('col-xl-12');
        }
    }
});


function show_error(error_data) {
    let { formId, appendClass = ".placeError", rules } = error_data;

    $(formId).validate({
        rules: rules,
        ignore: "",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(appendClass).append(error);
        },

        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },

        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        }
    });
}

