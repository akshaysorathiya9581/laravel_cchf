function validateNum(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9]/;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

function validateAmount(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

function validateLet(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[A-Za-z]/;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

function validatePhone(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9+)( -]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

function formatString(e) {
    var inputChar = String.fromCharCode(event.keyCode);
    var code = event.keyCode;
    var allowedKeys = [8];
    if (allowedKeys.indexOf(code) !== -1) {
        return;
    }
    event.target.value = event.target.value
        .replace(
            /^([1-9]\/|[2-9])$/g,
            "0$1/" // 3 > 03/
        )
        .replace(
            /^(0[1-9]|1[0-2])$/g,
            "$1/" // 11 > 11/
        )
        .replace(
            /^([0-1])([3-9])$/g,
            "0$1/$2" // 13 > 01/3
        )
        .replace(
            /^(0?[1-9]|1[0-2])([0-9]{2})$/g,
            "$1/$2" // 141 > 01/41
        )
        .replace(
            /^([0]+)\/|[0]+$/g,
            "0" // 0/ > 0 and 00 > 0
        )
        .replace(
            /[^\d\/]|^[\/]*$/g,
            "" // To allow only digits and `/`
        )
        .replace(
            /\/\//g,
            "/" // Prevent entering more than 1 `/`
        );
}

function changeEventAmountVal(evtAmount) {
    if (evtAmount > 0) {
        var portions = evtAmount / $("#EventPrice").val();
        var portionsValue =
            portions % 1 !== 0 ? portions.toFixed(2) : portions.toFixed(0);
        $("#no_of_portions").val(portionsValue);
        setPortionsTextPlural(portions);
    } else {
        $("#no_of_portions").val("");
        setPortionsTextPlural(0);
    }
    $("#EventAmount").val(numberFormat($("#EventAmount").val()));
    $(".pricing-buttons").removeClass("active");
}

function changePortionVal(portionVal) {
    if (portionVal > 0) {
        var eventTotalPrice = portionVal * Number($("#EventPrice").val());
        $("#EventAmount").val(numberFormat(eventTotalPrice.toFixed(0)));
    } else {
        let n = Number($("#EventPrice").val());
        $("#EventAmount").val(numberFormat(n.toFixed(0)));
    }
    setPortionsTextPlural(portionVal);
    $(".pricing-buttons").removeClass("active");
}

function numberFormat(number) {
    if (isNaN(number)) return number;
    return new Intl.NumberFormat().format(number);
}

function changePriceQTY(evtPrice, evtQTY, btnID) {
    var portions = Number(evtQTY);
    var eventTotalPrice = portions * Number(evtPrice);
    $("#EventAmount").val(numberFormat(eventTotalPrice.toFixed(0)));
    var portionsValue =
        portions % 1 !== 0 ? portions.toFixed(2) : portions.toFixed(0);
    $("#no_of_portions").val(portionsValue);

    setPortionsTextPlural(portions);
    $(".pricing-buttons").removeClass("active");
    $("#prc_" + btnID).addClass("active");
}

function setPortionsTextPlural(numPortions) {
    if (!numPortions) {
        $(".portions-packages").hide();
        return;
    }
    $(".portions-packages").show();

    let v = $(".portions-packages").text();
    if (numPortions > 1 && !v.endsWith("s")) v += "s";
    else if (numPortions == 1 && v.endsWith("s")) v = v.slice(0, -1);
    $(".portions-packages").text(v);
}

function allowCustomPrice(btnID) {
    $("#EventAmount").val("");
    $("#no_of_portions").val("");
    $("#EventAmount").focus();

    setPortionsTextPlural(0);
    $(".pricing-buttons").removeClass("active");
    $("#prc_" + btnID).addClass("active");
}

function removeItemFromCart(baseURL, id) {
    $.post(
        baseURL + "/checkout-cart.php",
        {
            action: "removeFromCart",
            id: id,
        },
        function (data) {
            if (window.location.pathname.endsWith("/checkout")) {
                location.reload();
            } else {
                $.post(
                    baseURL + "/checkout-cart.php",
                    {
                        action: "ViewCart",
                    },
                    function (cartData) {
                        $("#mini-cart").html(cartData);
                        showCart();
                    }
                );
            }
        }
    );
}

function SponsorMeal(
    baseURL,
    eventName,
    eventPrice,
    eventID,
    locationID,
    locationName,
    groupID,
    sponsorType,
    quantity,
    dayName = ""
) {
    $(".dedicateDonationCheckbox").addClass("d-none");
    if (groupID == 4) {
        $(".dedicateDonationCheckbox").removeClass("d-none");
    }
    $.post(
        baseURL + "/checkout-cart.php",
        {
            action: "addToCart",
            eventID: eventID,
            eventPrice: eventPrice,
            eventName: eventName,
            locationID: locationID,
            locationName: locationName,
            groupID: groupID,
            sponsorType: sponsorType,
            quantity: quantity,
            dayName: dayName,
        },
        function (data) {
            var location =
                locationName != "Any" ? " (" + locationName + ")" : "";
            $("#EventCartModalTitle").html(eventName + location);
            $("#cart_modal").html(data);
            $("#EventCartModal").modal("show");
        }
    );
}

function SponsorGroup(
    baseURL,
    eventName,
    eventPrice,
    eventID,
    locationID,
    locationName,
    groupID,
    sponsorType,
    quantity
) {
    $.post(
        baseURL + "/checkout-cart.php",
        {
            action: "fillCart",
            eventID: eventID,
            eventPrice: eventPrice,
            eventName: eventName,
            eventAmount: eventPrice * quantity,
            locationID: locationID,
            locationName: locationName,
            groupID: groupID,
            portions: quantity,
            sponsorType: sponsorType,
        },
        function (data) {
            window.location.href = baseURL + "/checkout";
        }
    );
}

function GoToCheckout(homeURL, skipDedication = false) {
    console.log("GoToCheckout", skipDedication);
    if (
        !skipDedication &&
        document.getElementById("dedicateDonationCheckbox").checked
    ) {
        OpenDedicateMealModal();
    } else {
        AddToCart(homeURL, true);
    }
}

function OpenDedicateMealModal() {
    let dayName = $("#dayName").val();
    let names = [
        "Abraham / אַבְרָהָם",
        "Isaac / יִצְחָק",
        "Jacob / יַעֲקֹב",
        "Moses / מֹשֶׁה",
        "Aaron / אַהֲרוֹן",
        "Joseph / יוֹסֵף",
        "David / דָּוִד",
    ];

    if (dayName === "") {
        $(".UshpizinName").find("input").remove();
        let selectElement = $("<select>")
            .attr("name", "donateForTheDay")
            .addClass("form-control")
            .attr("id", "donateForTheDay");

        $.each(names, function (index, name) {
            let optionElement = $("<option>").val(name).text(name);
            selectElement.append(optionElement);
        });
        $(".UshpizinName").html(selectElement);
    } else {
        $("#donateForTheDay").val(dayName);
    }
    $("#EventCartModal").modal("hide");
    $("#DedicationModal").modal("show");
}

function AddToCart(baseURL, redirectToCheckout = false) {
    if ($("#no_of_portions").val() < 1 && $("#EventAmount").val() < 1) {
        $("#cartError").text("Amount or Quantity should not be empty!");
        $("#cartError").fadeIn("slow");
        setTimeout(function () {
            $("#cartError").fadeOut("slow");
        }, 4000);
    } else {
        $.post(
            baseURL + "/checkout-cart.php",
            {
                action: "fillCart",
                eventID: $("#EventID").val(),
                eventPrice: $("#EventPrice").val(),
                eventName: $("#EventName").val(),
                eventAmount: $("#EventAmount").val(),
                locationID: $("#eventLocation").val(),
                locationName: $("#eventLocationName").val(),
                groupID: $("#GroupID").val(),
                portions: $("#no_of_portions").val(),
                donateForTheDay: $("#donateForTheDay").val(),
                donatedToFirstName: $("#donatedToFirstName").val(),
                donatedToLastName: $("#donatedToLastName").val(),
                donatedToEmail: $("#donatedToEmail").val(),
                donatedToMsg: $("#donatedToMsg").val(),
            },
            function (data) {
                $.post(
                    baseURL + "/checkout-cart.php",
                    {
                        action: "ViewCart",
                    },
                    function (cartData) {
                        $("#mini-cart").html(cartData);
                        if (redirectToCheckout) {
                            window.location.href = baseURL + "/checkout";
                        }
                    }
                );
                $("#EventCartModal").modal("hide");
            }
        );
    }
}

function showCart() {
    $(".mini-cart-content").toggleClass("mini-cart-content-toggle");
}

function changeTicketCount(btnAction, id, price) {
    var tickets = $("#no_of_portions").val();
    let totalTickets;
    if (btnAction == "1") {
        var addTicket = Number(tickets) + 1;
        totalTickets = addTicket;
        $("#no_of_portions").val(totalTickets);
    }
    if (btnAction == "0" && tickets > 1) {
        totalTickets = tickets - 1;
        $("#no_of_portions").val(totalTickets);
    }
    $("#" + id).text((price * (totalTickets || 1)).toFixed(2));
}

$("#donate_amount").keyup(function () {
    var currency = $("#donate_currency").val() == "USD" ? "$" : "$";
    if (this.value > 0) {
        var proFeeAmt = $("#fee_percentage").val();
        var processFee = (this.value * proFeeAmt) / 100;
        $("#process_fee").html(
            "Add " +
                currency +
                processFee.toFixed(2) +
                " to your payment to cover the " +
                proFeeAmt +
                "% credit card processing fee"
        );
        $("#don_process_fee").val(processFee.toFixed(2));

        var isRecPay = $("#don_recurring").is(":checked") ? 1 : 0;
        $("#isRec").val(isRecPay);

        var customAmount = Number(this.value).toFixed(2);
        $("#rec_amount_full").html(currency + customAmount);

        showPaymentSection();
    } else {
        $("#process_fee").html(
            "Add " +
                currency +
                "0.00 to your payment to cover the credit card processing fees"
        );
        $("#don_process_fee").val(0);
        if ($("#isRec").val() == "1") {
            $("#rec_amount_full").html(currency + "0.00");
        }
    }
});

function manualAmount() {
    var currency = $("#donate_currency").val() == "USD" ? "$" : "$";

    if ($("#manual_amount").is(":checked")) {
        $("#donate_amount").attr("readonly", false);
        $("#donate_amount").css({
            cursor: "text",
            border: "1px solid #999",
        });
        $("#donate_amount").focus();
        $("#donate_amount").val("");
        $("#process_fee").html(
            "Add " +
                currency +
                "0.00 to your payment to cover the credit card processing fees"
        );
        $("#rec_amount_full").html(currency + "0.00");
    } else {
        var totalAmount = $("#total_donation").val();
        var proFeeAmt = $("#fee_percentage").val();
        var processFee = (totalAmount * proFeeAmt) / 100;
        $("#process_fee").html(
            "Add " +
                currency +
                processFee.toFixed(2) +
                " to your payment to cover the " +
                proFeeAmt +
                "% credit card processing fee"
        );
        $("#don_process_fee").val(processFee.toFixed(2));

        $("#rec_amount_full").html(currency + Number(totalAmount).toFixed(2));

        $("#donate_amount").attr("readonly", true);
        $("#donate_amount").css({
            cursor: "text",
            border: "none",
        });
        $("#donate_amount").val(totalAmount);
    }

    var isRecPay = $("#don_recurring").is(":checked") ? 1 : 0;
    $("#isRec").val(isRecPay);

    showPaymentSection();
}

function allowManualAmount() {
    $("#manual_amount").prop("checked", true);
    manualAmount();
}

function changeIntervals(recInterval) {
    var currency = $("#donate_currency option:selected").text();
    var amount = $("#donate_amount").val();
    var recMonthAmt = amount / recInterval;
    $("#rec_amount_full").html(currency + amount);
    $("#rec_amount_month").html(currency + recMonthAmt.toFixed(2));
    showPaymentSection();
}

$("#recurring_interval").on("change", function () {
    showPaymentSection();
});

function submitRecPP(baseURL) {
    var fname = $("#first_name").val();
    var lname = $("#last_name").val();
    var email = $("#email").val();
    if (fname.trim() == "") {
        $("#FormErr").text("First name is required field!");
        $("#FormErr").fadeIn("slow");
        setTimeout(function () {
            $("#FormErr").fadeOut("slow");
        }, 3000);
        return false;
    } else if (lname.trim() == "") {
        $("#FormErr").text("Last name is required field!");
        $("#FormErr").fadeIn("slow");
        setTimeout(function () {
            $("#FormErr").fadeOut("slow");
        }, 3000);
        return false;
    } else if (email.trim() == "") {
        $("#FormErr").text("Email is required field!");
        $("#FormErr").fadeIn("slow");
        setTimeout(function () {
            $("#FormErr").fadeOut("slow");
        }, 3000);
        return false;
    } else {
        var formDataAll = $("#donate_form").serialize();
        $.post(
            baseURL + "/app-actions.php",
            {
                userAction: "storeRecDataPP",
                formdata: formDataAll,
            },
            function (data) {
                console.log("data sent...");
            }
        );
        return true;
    }
}

function breakupDonation() {
    $(".rec_btns").hide();
    $("#don_recurring").prop("checked", false);
    $("#daily_rec").prop("checked", true);
    $("#recurring_cycle").prop("selectedIndex", 0);
}

function SubmitLeadForm(baseURL, homeURL) {
    var fullname = $("#fullname").val();
    var phone = $("#phone").val();
    $.post(
        baseURL + "/app-actions.php",
        {
            userAction: "leadForm",
            fullname: fullname,
            phone: phone,
        },
        function (data) {
            $("#leadMsg").show("slow");
            setTimeout(function () {
                window.location.href = homeURL + "/";
            }, 5000);
        }
    );
    return false;
}

$("#process_fee_check").click(function () {
    showPaymentSection();
});

$("#paywithcc").click(function () {
    $("#pay_with_ojc").val("no");
    $(".paywithcc").show();
    $(".paywithojc").hide();
    $("#ojc_card_num").attr("required", false);
    $("#ojc_expiry").attr("required", false);
    $("#paywithcc").addClass("active");
    $("#paywithojc").removeClass("active");
});

$("#paywithojc").click(function () {
    $("#pay_with_ojc").val("yes");
    $(".paywithojc").show();
    $(".paywithcc").hide();
    $("#ojc_card_num").attr("required", true);
    $("#ojc_expiry").attr("required", true);
    $("#paywithcc").removeClass("active");
    $("#paywithojc").addClass("active");
});

// $("#load-more-donors").click(function() {

function loadMoreDonors(obj, recent = "", topDonors = "") {
    $("#overlayloader").css("display", "block");
    var baseURL = $("#baseURL").val();
    let currentSortingOption;
    if (recent === "" && topDonors === "") {
        currentSortingOption = "";
    } else {
        currentSortingOption = recent !== "" ? "recent" : "topDonors";
        sortingOption = $("#sortingOption").val(currentSortingOption);
    }
    // alert(currentSortingOption)

    $.post(
        baseURL + "/app-actions.php",
        {
            userAction: "loadMoreDonors",
            causeID: $("#causeID").val(),
            recordStartLimit: $("#recordLimit").val(),
            recordEndLimit: Number($("#recordLimit").val()) + 12,
            topDonors: topDonors,
            recent: recent,
            sortingOption: $("#sortingOption").val(),
        },
        function (data) {
            $("#overlayloader").css("display", "none");
            if (data == "") {
                $(".load-more-btn").hide();
            } else {
                $("#recordLimit").val(Number($("#recordLimit").val()) + 12);
                if (currentSortingOption !== "" || sortingOption !== "") {
                    $(".donors-list").html(data);
                    $("#sortBy").text($("#sortingOption").val());
                } else {
                    $(".donors-list").append(data);
                }
            }
        }
    );
}
// });

const moveToSponsorMeal = () => {
    $("[data-progress]").each(function () {
        var progress = parseInt($(this).data("progress"));
        if (progress < 100) {
            var targetPosition = $(this).offset().top - 300;
            $("html, body").animate(
                {
                    scrollTop: targetPosition,
                },
                100
            );
            return false;
        }
    });
};

$(
    "#donateForTheDay, #donatedToFirstName, #donatedToLastName, #donatedToEmail, #donatedToMsg"
).on("input change", function () {
    var fieldId = $(this).attr("id");

    var hiddenFieldId =
        "hidden" + fieldId.charAt(0).toUpperCase() + fieldId.slice(1);

    // Update the hidden input field's value with the visible field's value
    $("#" + hiddenFieldId).val($(this).val());
});
