<div class="bg-lightblue pt-5 pb-10 px-20 flex flex-col h-full">
    <x-navbar name="{{ auth()->user()->name }}" gold="{{auth()->user()->gold }}" point="{{auth()->user()->actual_points}}"
              pageTitle="Leaderboard"/>

    <p id="freeze-banner" class="mr-auto mx-auto text-4xl text-red-700 mt-14"></p>
    <table id="leaderboard-table" class="h-96 w-5/6 text-2xl text-center mt-7 ml-auto mr-auto table-auto border-2 border-darkblue">
        <tr class="">
            <th class=" w-1/5 p-5">Position</th>
            <th class=" w-1/5 p-5">Team</th>
            <th class=" w-1/5 p-5">Points</th>
            <th class=" w-1/5 p-5">Gold</th>
        </tr>

    </table>
</div>


<script>

    window.onload=startCheckLeaderboard();
    var check;


    function startCheckLeaderboard(){
        leaderboardCheck();
        itemCheck();
        check = setInterval(leaderboardCheck,10000);
    }
    function itemCheck(){
        $.ajax({
            url: 'useItem/activeItems',
            method: 'post',
        }).done(function(response){
            if(response=="-1"){
                $("#active-items").html("Active Items : - ");
            }
            else{
                let activeItems = JSON.parse(response);
                $("#active-items").html('Active Items : ');
                for(let i=0; i<activeItems.length;i++){
                    $("#active-items").append('<div className="ml-3 h-4 w-auto flex-col"><img class="ml-3 mtl-image w-8 h-8 rounded-md" src="'+activeItems[i].src+'" alt=""></div>');
                }
            }
        });
    }
    function leaderboardCheck() {
        $.ajax({
            url: 'leaderboard/loadLeaderboard',
            method: 'post',
        }).done(function (response) {
                $("#leaderboard-table").html('<tr id="table-head">');
                $("#leaderboard-table").append('<th class="pt-5 w-1/5 p-5 bg-darkblue text-white">Position</th>');
                $("#leaderboard-table").append('<th class="pt-5 w-1/5 p-5 bg-darkblue text-white">Team</th>');
                $("#leaderboard-table").append('<th class="pt-5 w-1/5 p-5 bg-darkblue text-white">Points</th>');
                $("#leaderboard-table").append('<th class="pt-5 w-1/5 p-5 bg-darkblue text-white">Gold</th>');
                $("#leaderboard-table").append('</div>');

                let players = JSON.parse(response);
                let sentence = "";
                for(let i=0; i<players.length; i++){
                    $("#leaderboard-table").append('<tr id="table-data">');

                    $("#leaderboard-table").append('<td class="p-3 bg-themegreen">'+(i+1)+'</td>');

                    sentence = '<td class="p-3 bg-themegreen">' + players[i].name + '</td>';
                    $("#leaderboard-table").append(sentence);

                    sentence = '<td class="p-3 bg-themegreen">' + players[i].points + '</td>';
                    $("#leaderboard-table").append(sentence);

                    sentence = '<td class="p-3 bg-themegreen">' + players[i].gold + '</td>';
                    $("#leaderboard-table").append(sentence);

                    $("#leaderboard-table").append('</tr>');
                }

            });
        $.ajax({
            url: 'leaderboard/checkFreezeState',
            method: 'post',
        }).done(function (response) {
            if(response==-1){
                $("#freeze-banner").html("Leaderboard is now frozen");
            }
        });


        $.ajax({
            url: 'useItem/gameState',
            method: 'post',
        }).done(function(response){
            if(response=="1"){
                document.getElementById("game-state").className = "ml-3 w-4 h-4 bg-green-400 rounded";
            }
            else{
                document.getElementById("game-state").className = "ml-3 w-4 h-4 bg-red-600 rounded";
            }
        });

    }

</script>
