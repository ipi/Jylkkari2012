function arkistoUpdateIssueSelector(cat){
            fadespeed = "fast";
            $.post(arkistoUrl, {year:cat},function (data){
                $('#issue_selector').fadeOut(fadespeed,function(){
                    $('#issue_selector').empty();
                    $('#issue_selector').append(data);
                    $('#issue_selector').fadeIn(fadespeed);
                    });
                });
}

function arkistoUpdateIssueList(page){
        fadespeed = "fast";
            $.post(arkistoUrl, {issue:page},function (data){
                $('#issue_list').fadeOut(fadespeed,function(){
                    $('#issue_list').empty();
                    $('#issue_list').append(data);
                    $('#issue_list').fadeIn(fadespeed);
                    });
                });
}
