import formatDate from "./dateFormatter.js";
import { CountUp } from "./countUp.min.js";

var masbia_filter_list = [];
$(document).ready(function () {
    
    // my new code start
    $(".cart").hide();

    setTimeout(function () {
        // $('.sponsor__options-tabs .tab-link').first().click();
        $('.cart__heading').text('Checkout');

        for (let i = 0; i < localStorage.length; i++) {
            let key = localStorage.key(i);
            let value = localStorage.getItem(key);
            console.log(`<p>Key: ${key}, Value: ${value}</p>`);
            if(value == '') { return }

            if(key == 'sustainer_option_id') {
                $('.btn-filter[data-name="sustainer_option_id"][data-id="'+value+'"]').trigger('click');
            }  

            if(key == 'donation_amount') {
                $('.donation-amount[data-name="donation_amount"][data-id="'+value+'"]').trigger('click');
            }

            if(key == 'donation_location_id') {
                $('.donation_location[data-name="donation_location_id"][data-id="'+value+'"]').trigger('click');
            }

            if(key == 'allocate_donation') {
                $('#allocate_donation').val(value).trigger('change');
            }

            if(key == 'dedication_comments') {
                $('#dedication_comments').val(value).trigger('blur');
            }

            if(key == 'dedication_comments') {
                $('#dedication_comments').val(value).trigger('blur');
            }

            if(key == 'letter' && parseInt(value)) {
                $('#letter').prop('checked', value).trigger('change');
            }

            if(key == 'recognition' && parseInt(value)) {
                $('#recognition').prop('checked', value).trigger('change');
            }

            if(key == 'other_amount') {
                $('#customAmount').val(value);
                $("#customAmount").trigger("blur");
            }
        }
     }, 200);

    $(document).on('click', '.option-card', function(event) {
        var _this =  $(this);
        $(_this).closest('.sponsor__donation-btns').find('.selected').removeClass('selected');
        $(_this).addClass('selected');
        $("#only_donation").val(_this.attr('data-price'));
        $("#pricing_options").val(_this.attr('data-id'));
        add_filter_value(_this.attr('data-name'), _this.attr('data-id'));
        caculate_final_donate_amount();
    });

    $(document).on('click', '.btn-filter', function(event) {
        var _this = $(this);
        add_filter_value(_this.attr('data-name'), _this.attr('data-id'));
    });

    $(document).on('click', '.donation_location', function(event) {
        var _this = $(this);
        _this.closest('.location-wrapper').find('button').removeClass('selected');
        _this.addClass('selected');
        add_filter_value(_this.attr('data-name'), _this.attr('data-id'));
    });

    $(document).on('keyup blur', '#dedication_comments', function(event) {
        var _this = $(this);
        add_filter_value(_this.attr('name'), _this.val());
    });

    $(document).on('click', '.sponsor__options-tabs .tab-link', function(event) {
        $(".cart__subtitle, .entry-quantity").text($(this).text());
        $(".cart").slideDown();
        setTimeout(function () {
            // showPaymentSection();
            $(".cart").show();
        }, 300);
    });

    $(document).on('change', '#allocate_donation', function(event) {
        var _this = $(this);
        $(".selected-tickets .cart__summary-list").find('.allocate_donation_option').remove();
        if(_this.val() != '') {
            $(".selected-tickets .cart__summary-list").append('<li class="allocate_donation_option"><span>Allocate Donation : </span>'+_this.find("option:selected").attr("data-name")+'</li>');
        }
        add_filter_value(_this.attr('name'), _this.val());

        $(".cart").slideDown();
        setTimeout(function () {
            // showPaymentSection();
            $(".cart").show();
        }, 300);
    });

    $(document).on('change', '#letter', function(event) {
        var _this = $(this);
        var price = _this.closest('.donation__dedication').find('span').attr('data-price');
        $(".selected-tickets .cart__summary-list").find('.letter-option').remove();
        $('#letter_amount').val(price);
        if(_this.is(':checked')) {
            $(".selected-tickets .cart__summary-list").append('<li class="letter-option"><span>Letter request : </span>$'+price+'</li>');
        } else {
            $('#letter_amount').val('');
        }
        add_filter_value(_this.attr('name'), +_this.is(':checked'));
        caculate_final_donate_amount();
    });

    $(document).on('change', '#recognition', function(event) {
        var _this = $(this);
        var price = _this.closest('.donation__dedication').find('span').attr('data-price');
        $(".selected-tickets .cart__summary-list").find('.recognition-option').remove();
        $('#recognition_amount').val(price);
        if(_this.is(':checked')) {
            $(".selected-tickets .cart__summary-list").append('<li class="recognition-option"><span>Recognition Request : </span>$'+price+'</li>');
        } else {
            $('#recognition_amount').val('');
        }
        add_filter_value(_this.attr('name'), +_this.is(':checked'));
        caculate_final_donate_amount();
    });

    $(document).on('blur', '#customAmount', function(event) {
        var _this = $(this);
        let inputVal = _this.val().trim();
        inputVal = inputVal.replace(/[^0-9.]/g, "");

        $('#only_donation').val(0);
        if (!isNaN(inputVal) && inputVal !== "") {
            $('#only_donation').val(inputVal);
            let formattedValue = new Intl.NumberFormat("en-US", {
                style: "currency",
                currency: "USD",
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            }).format(parseFloat(inputVal));

            _this.val(formattedValue);
            add_filter_value('other_amount', formattedValue);
        } else {
            _this.val("");
            add_filter_value('other_amount', '');
        }
        caculate_final_donate_amount();
    });

    // my new code end

    $("#collapseCart").on("show.bs.collapse hide.bs.collapse", function (e) {
        const isRegularTemplate = $(".cart").hasClass("cart--regular");
        var CurrencyLetters =
            $("#currency-select option:selected").val() || "USD";
        var CurrencySymbol =
            $("#currency-select option:selected").text() || "$";

        let amountValue = $("#donate_amount").val();
        let amount;
        amount = mutiFormatCurrency(amountValue, CurrencyLetters);

        if (e.type === "show") {
            if ($(window).width() > 767) {
                $(".cart__summary .checkout-btn").text("Back");
            } else {
                $(".cart__summary .checkout-btn").hide();
            }
            $(".remove-cart-details").show();
            $("#gift-btn").removeClass("btn--gray");
        } else {
            $("#gift-btn").addClass("btn--gray");
            $(".remove-cart-details").hide();
            $(".cart__summary .checkout-btn").show();
            $(".cart__summary .checkout-btn").html(`<span>${isRegularTemplate ? "Donate" : "Checkout"
                }</span>
      <span class="divider"></span>
      <span class="checkout-btn__amount">${amount}</span>`);

            if (isRegularTemplate && ticketAmount > 0) {
                $(
                    ".cart--regular .checkout-btn__amount, .cart--regular .checkout-btn .divider"
                ).css("display", "block");
            }
        }
    });
    renderTicketPages();
});

function add_filter_value(_key, _value) {
    var newEntry = {
        name: _key,
        value: _value
    };

    // Check if there's already an entry with the same name
    var existingEntry = masbia_filter_list.find(entry => entry.name === newEntry.name);

    if (existingEntry) {
        // If found, update the id
        existingEntry.value = newEntry.value;
    } else {
        // Otherwise, add as a new entry
        masbia_filter_list.push(newEntry);
    }

    masbia_filter_list.forEach(function(item) {
        localStorage.setItem(item.name, item.value);
    });
    let myArrayString = JSON.stringify(masbia_filter_list);
    $('#donation_masbia_details').val(myArrayString);
}

function caculate_final_donate_amount() {
    var CurrencyLetters = $("#currency-select option:selected").val() || "USD";
    var CurrencySymbol = $("#currency-select option:selected").text() || "$";
    var only_donation = $("#only_donation").val();
    if(only_donation == '') {
        console.log('Please enter Donation amount');
        return;
    }

    var final_donate_amount = parseFloat($("#only_donation").val());
    if($("#letter_amount").val() != '' && $("#letter_amount").val() > 0) {
        final_donate_amount += parseFloat($("#letter_amount").val())
    }

     if($("#recognition_amount").val() != '' && $("#recognition_amount").val() > 0) {
        final_donate_amount += parseFloat($("#recognition_amount").val())
    }

    console.log('final_donate_amount=',final_donate_amount);
    var formattedAmount = mutiFormatCurrency(
        final_donate_amount,
        CurrencyLetters
    );

    var formattedAmountDonation = mutiFormatCurrency(
        only_donation,
        CurrencyLetters
    );

    $('#donate_amount').val(final_donate_amount);
    $('#usd_amount').val(final_donate_amount);
    $(".js-cart-summary-amount").html(
        `${siteContent.cart.ticketsTitle} <span>${formattedAmount}</span>`
    );

    // alert(formattedAmountDonation)

    $(".checkout-btn__amount").text(formattedAmount);
    $("#customAmount").val(formattedAmountDonation);

    $(".cart").slideUp();
    setTimeout(function () {
        // showPaymentSection();
        $(".cart").slideDown();
    }, 500);
}

function formatNumber(number) {
    if (number >= 1000) {
        return number / 1000 + "k";
    } else {
        return number.toString();
    }
}

function formatCurrency(
    amount,
    minimumFractionDigits,
    maximumFractionDigits,
    currency = "USD"
) {
    amount = parseFloat(amount);
    if (isNaN(amount)) {
        amount = 0;
    }
    return amount.toLocaleString("en-US", {
        style: "currency",
        currency: "USD",
        minimumFractionDigits: minimumFractionDigits,
        maximumFractionDigits: maximumFractionDigits,
    });
}

function mutiFormatCurrency(amount, currency, minimumFractionDigits, maximumFractionDigits) {
    // Check if amount is an integer or a floating point with ".00"
    const isInteger = Number(amount) === Math.floor(amount);

    return Number(amount).toLocaleString("en", {
        style: "currency",
        currency: currency,
        minimumFractionDigits: isInteger ? 0 : minimumFractionDigits,
        maximumFractionDigits: isInteger ? 0 : maximumFractionDigits,
    });
}

function renderTicketPages() {
    console.log('siteContent.setting.templateType=',siteContent.setting.templateType);
    if (siteContent.setting.templateType == "masbia") {
        const TicketPackage = ({
            id,
            amount,
            entry,
            previousEntries,
            grandPrize,
            prizesAmount,
            prizes,
            couponApplied,
        }) => {
            var option = (id == '99') ? `<button class="donation-amount other option-card ticket_item" data-name="donation_amount" data-price="${amount}" data-id="${id}">Other<br>Amount</button>` : `<button class="donation-amount option-card ticket_item" data-name="donation_amount" data-price="${amount}" data-id="${id}">${formatCurrency(amount, 0, 0)}</button>`;
            return option;
        };

        console.log('siteContent.tickets.packages=',siteContent.tickets.packages);
        var masbia_option = siteContent.tickets.packages.map(TicketPackage).join("");
        $(".options-grid").prepend(masbia_option);

        // let $donationButton = $('.sponsor__donation-btns').find('.donation-amount').first();
        // if ($donationButton.length > 0) {
        //     $donationButton.click();
        // } 
    }
}