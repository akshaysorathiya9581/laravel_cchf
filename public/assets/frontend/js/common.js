function makeRecurring() {
    if ($("#don_recurring").is(":checked")) {
        $(".rec_btns").show();
        $("#don_recurring").val(1);
        $("#custom_recurring_cycle").val("2");
    } else {
        $(".rec_btns").hide();
        $("#don_recurring").removeAttr("checked");
        $("#custom_recurring_cycle").val("0");
        $(".default_radio").trigger("click");
        $("#don_recurring").val(0);
    }
}

$(document).ready(function () {
    let offset = 12;
    const campaignId = $("#campaing_id").val();
    const team_id = $("#url_team_id").val();

    function formatExpiry(selector) {
        $(selector).on("input", function () {
            let value = $(this).val().replace(/\D/g, "");
            if (value.length >= 2) {
                value = value.substring(0, 2) + "/" + value.substring(2, 4);
            }
            $(this).val(value);
        });
    }
    const expirySelectors = [
        "#expiryCC",
        "#mtb_expiry",
        "#authnet_exp",
        "#ojc_expiry",
        "#plg_expiry",
    ];
    expirySelectors.forEach(formatExpiry);

    function loadDonations(search = "", filter = "", loadmore = "") {
        $.ajax({
            url: "/load-more-donations",
            type: "GET",
            data: {
                campaignId: campaignId,
                offset: offset,
                search: search,
                filter: filter,
                load: loadmore,
            },
            success: function (response) {
                console.log(response);
                //
                if (response.data.length < 12) {
                    $(".load_more").hide();
                } else {
                    $(".load_more").show();
                }
                if (response.data.length > 0) {
                    if (response.loadmore == "yes") {
                        $("#DonationMainContainer .donations_container").append(
                            response.data
                        );
                        offset += 12;
                    } else {
                        $("#DonationMainContainer .donations_container").html(
                            response.data
                        );
                    }
                }
            },
            error: function (error) {
                console.log("Error loading more donations:", error);
            },
        });
    }
    //____LOAD MORE
    $(".load_more").on("click", function () {
        const searchTerm = $("#searchInput").val();
        const filter = $("#filterSelect").val();
        loadDonations(searchTerm, filter, "yes");
    });

    //__FILTER_BY_SORTING
    $("#filterSelect").on("change keyup", function () {
        offset = 12;
        $(".donations_container").empty();
        loadDonations($("#searchInput").val(), $("#filterSelect").val(), "no");
    });

    // ___SEARCH_FILTER
    $("#searchInput").on("input", function () {
        offset = 12;
        $(".donations_container").empty();
        loadDonations($("#searchInput").val(), $("#filterSelect").val(), "no");
    });

    function loadTeams(search = "", filter = "", loadmore = "") {
        $.ajax({
            url: "/load-more-teams",
            type: "GET",
            data: {
                campaignId: campaignId,
                offset: offset,
                team_id: team_id,
                search: search,
                filter: filter,
                load: loadmore,
            },
            success: function (response) {
                console.log(response);
                //
                if (response.data.length < 12) {
                    $(".team_load_more").hide();
                } else {
                    $(".team_load_more").show();
                }
                if (response.data.length > 0) {
                    if (response.loadmore == "yes") {
                        $("#TeamsMainContainer .teams_container").append(
                            response.data
                        );
                        offset += 12;
                    } else {
                        $("#TeamsMainContainer .teams_container").html(
                            response.data
                        );
                    }
                }
            },
            error: function (error) {
                console.log("Error loading more Teams:", error);
            },
        });
    }
    $(".team_load_more").on("click", function () {
        const searchTerm = $("#teamsearchInput").val();
        const filter = $("#teamfilterSelect").val();
        loadTeams(searchTerm, filter, "yes");
    });

    $("#teamfilterSelect").on("change keyup", function () {
        offset = 12;
        $(".teams_container").empty();
        loadTeams(
            $("#teamsearchInput").val(),
            $("#teamfilterSelect").val(),
            "no"
        );
    });
    $("#teamsearchInput").on("input", function () {
        offset = 12;
        $(".teams_container").empty();
        loadTeams(
            $("#teamsearchInput").val(),
            $("#teamfilterSelect").val(),
            "no"
        );
    });

    function loadTeamDonations(search = "", filter = "", loadmore = "") {
        $.ajax({
            url: "/load-more-team-donations",
            type: "GET",
            data: {
                campaignId: campaignId,
                offset: offset,
                search: search,
                filter: filter,
                team_id: team_id,
                load: loadmore,
            },
            success: function (response) {
                console.log(response);
                if (response.data.length < 12) {
                    $(".team_donors_load_more").hide();
                } else {
                    $(".team_donors_load_more").show();
                }
                if (response.data.length > 0) {
                    if (response.loadmore == "yes") {
                        $(
                            "#TeamsDonorsContainer .teams_donors_container"
                        ).append(response.data);
                        offset += 12;
                    } else {
                        $("#TeamsDonorsContainer .teams_donors_container").html(
                            response.data
                        );
                    }
                }
            },
            error: function (error) {
                console.log("Error loading more donations:", error);
            },
        });
    }
    //____LOAD MORE
    $(".team_donors_load_more").on("click", function () {
        const searchTerm = $("#teamsDonorsearchInput").val();
        const filter = $("#teamDonorsfilterSelect").val();
        loadTeamDonations(searchTerm, filter, "yes");
    });

    //__FILTER_BY_SORTING
    $("#teamDonorsfilterSelect").on("change keyup", function () {
        offset = 12;
        $(".teams_donors_container").empty();
        loadTeamDonations(
            $("#teamsDonorsearchInput").val(),
            $("#teamDonorsfilterSelect").val(),
            "no"
        );
    });

    // ___SEARCH_FILTER
    $("#teamsDonorsearchInput").on("input", function () {
        offset = 12;
        $(".teams_donors_container").empty();
        loadTeamDonations(
            $("#teamsDonorsearchInput").val(),
            $("#teamDonorsfilterSelect").val(),
            "no"
        );
    });

    function DonationformatedDate(dateString) {
        const date = new Date(dateString);
        const now = new Date();

        const diffInMs = now - date;
        const diffInSeconds = Math.floor(diffInMs / 1000);
        const diffInMinutes = Math.floor(diffInSeconds / 60);
        const diffInHours = Math.floor(diffInMinutes / 60);
        const diffInDays = Math.floor(diffInHours / 24);

        if (diffInSeconds < 60) {
            return `${diffInSeconds}s ago`;
        } else if (diffInMinutes < 60) {
            return `${diffInMinutes}m ago`;
        } else if (diffInHours < 24) {
            return `${diffInHours}h ago`;
        } else if (diffInDays < 7) {
            return `${diffInDays} day${diffInDays > 1 ? "s" : ""} ago`;
        } else if (date.getFullYear() === now.getFullYear()) {
            return `${date.toLocaleString("en-US", {
                month: "short",
            })} ${date.getDate()}`;
        } else {
            return `${date.toLocaleString("en-US", {
                month: "short",
            })} ${date.getDate()} '${date.getFullYear() % 100}`;
        }
    }

    function Fixed2(number) {
        return parseFloat(number).toFixed(2);
    }

    $(".teams_btn").on("click", function () {
        $(".teams_btn").addClass("active");
        $(".donors_btn").removeClass("active");
        $(".teams_sorting").show();
        $(".teams_donors_btn").removeClass("active");
        $(".donation_sorting").hide();
        $("#DonationMainContainer").hide();
        $("#TeamsDonorsContainer").hide();
        $(".teams_donors_sorting").hide();
        $("#TeamsMainContainer").show();
    });
    $(".donors_btn").on("click", function () {
        $(".teams_btn").removeClass("active");
        $(".teams_donors_btn").removeClass("active");
        $(".donors_btn").addClass("active");
        $("#DonationMainContainer").show();
        $("#TeamsMainContainer").hide();
        $("#TeamsDonorsContainer").hide();
        $(".teams_sorting").hide();
        $(".donation_sorting").show();
        $(".teams_donors_sorting").hide();
    });
    $(".teams_donors_btn").on("click", function () {
        $(".teams_btn").removeClass("active");
        $(".donors_btn").removeClass("active");
        $(".teams_donors_btn").addClass("active");
        $("#TeamsDonorsContainer").show();
        $("#DonationMainContainer").hide();
        $("#TeamsMainContainer").hide();
        $(".teams_sorting").hide();
        $(".donation_sorting").hide();
        $(".teams_donors_sorting").show();
    });
});
