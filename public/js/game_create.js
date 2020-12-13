 var pos_a = document.getElementById("possession_a");
 var pos_b = document.getElementById("possession_b");


function update_possession (CallerElement) {

if(CallerElement == pos_a) {
    pos_b.value = 100 - pos_a.value;
} else if (CallerElement == pos_b) {
    pos_a.value = 100 - pos_b.value;
} else {console.log("update_possesion Fehler: Es wurde ein falsches Element übergeben.");}
}

// update possession event Listener and check if they in the range of 0-100
pos_a.addEventListener('change', function call_update_a(){
    if (pos_a.value > 100) {
        pos_a.value = 100;
    } else if (pos_a.value < 0) {
        pos_a.value = 0;
    }
    update_possession(pos_a);
});
pos_b.addEventListener('change', function call_update_b(){
    if (pos_b.value > 100) {
        pos_b.value = 100;
    } else if (pos_b.value < 0) {
        pos_b.value = 0;
    }
    update_possession(pos_b);
});


function validateForm() {
    if (document.forms["game_submit"]["user_id_a"].value == document.forms["game_submit"]["user_id_b"].value) {
        alert("Es wurde zweimal der gleiche Spieler ausgewählt! Bitte wähle unterschiedliche Spieler aus!");
        return false;
    }
    if (document.forms["game_submit"]["team_a"].value == document.forms["game_submit"]["team_b"].value) {
        alert("Es wurde zweimal das gleiche Team ausgewählt! Bitte wähle unterschiedliche Teams aus!");
        return false;
    }
  }

