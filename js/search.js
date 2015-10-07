$(function() {
    // set the table to be right beneath the filter header
    $("#content").css("margin-top",$("#filter").css("height"));
    // and set it again whenever the window is resized
    $(window).resize(function() {
        $("#content").css("margin-top",$("#filter").css("height"));
    });

    // set the zebra-stripe pattern
    $("tr.result:odd").addClass("oddrow").removeClass("evenrow");
    $("tr.result:even").removeClass("oddrow").addClass("evenrow");
    
    // let the loading graphic fade out
    setTimeout(function() { $(".se-pre-con").fadeOut("slow")},1500);

    // $rows contains each of the object-code rows
    var $rows = $('#content tbody tr');

    // whenever someone types in the search bar, search
    $('#search').keyup(function() {
        // get the contents of the search bar
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        // which values are we checking?
        var searchable = [$('#code_check').is(":checked"),
                          $('#title_check').is(":checked"),
                          $('#desc_check').is(":checked"),
                          $('#cat_check').is(":checked")];

        // remove all non-results from the picture
        console.log("finding non-results");
        $rows.filter(function() {
            var text = "";
            var children = $(this).children();
            // only check the cells that are specified as filterable
            for(var i=0; i<4; i++) {
                if(searchable[i]) {
                    text += children[i].textContent.replace(/\s+/g, ' ').toLowerCase() + " ";
                }
            }
            // returns true if the search string does NOT occur in this row
            return !~text.indexOf(val);
        // Semantically, this is not a result, so it is "not-result" and not "result"
        }).addClass("not-result").removeClass("result").removeClass('oddrow');

        // Similar to above, except opposite 
        console.log("finding results");
        $rows.filter(function() {
            var text = "";
            var children = $(this).children();
            for(var i=0; i<4; i++) {
                if(searchable[i]) {
                    text += children[i].textContent.replace(/\s+/g, ' ').toLowerCase() + " ";
                }
            }
            return ~text.indexOf(val);
        }).addClass("result").removeClass("not-result");

        // reset the zebra-stripe pattern for only those rows that are results
        $("tr.result:odd").addClass("oddrow").removeClass("evenrow");
        $("tr.result:even").removeClass("oddrow").addClass("evenrow");

        // count the number of results that we have
        var n = $("tr.result").length;
        console.log("Number of results: " + n);

        if(val === "") {
            // if the search string was empty, all rows are results
            $('#result-header').html("All Object Codes Are Shown Below.");
            // since it's empty, we can't clear the text, so don't show the clear button
            $("#clear").hide();
        } else {
            // if there is a search string, notify the user of the number of results
            $('#result-header').html(n + " Results for: " + $.trim($(this).val()));
            // we can clear the search bar, so show the clear button
            $("#clear").show();
        }
    });

    // whenever someone clicks the (x) at the end of the search, clear the input
    $("#clear").on('click',function() {
        var input = $(this).prev('input');
        input.val('').focus();
        input.keyup();
    });

    // whenever any of the filter setting checkboxes are toggled, re-search to reflect changes
    $("#code_check").on('click',function() { $("#search").keyup(); })
    $("#title_check").on('click',function() { $("#search").keyup(); })
    $("#desc_check").on('click',function() { $("#search").keyup(); })
    $("#cat_check").on('click',function() { $("#search").keyup(); })
});