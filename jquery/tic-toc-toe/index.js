/**
 * 
 * Template Section
 * 
 */

//square template
function square(id){
    return (
    `
    <div id='square-${id}' class="square display-2 mb-2 border border-4 h-32 w-32 text-center" data-square-value='${id}'></div>
    `
    )
}

//board template
function board(){
    return (
    `
    <section>
        <div class="row ">
            <!-- Vertically aligned -->
            
            <div class=" col p-1 ">
            ${square(0)}
            ${square(3)}
            ${square(6)}
            </div>
            
            <div class=" col p-1 ">
            ${square(1)}
            ${square(4)}
            ${square(7)}
            </div>
            
            <div class=" col p-1 ">
            ${square(2)}
            ${square(5)}
            ${square(8)}
            </div>           
        </div>

        <small id="error-message" class="text-danger"></small>
    </section>
    `
    )
}

//overlay template
function overlay(playerName = '') {
    let message;
    if(playerName){
        message = `${playerName} Wins` 
    }
    else{
        message = 'Draw'
    }

    const bgStyle = (message == "Draw") ? "bg-danger bg-gradient" : "bg-success bg-gradient"; 
    return ( 
    `
    <div id="overlay" class="position-absolute top-0 start-0 vh-100 vw-100 z-3 ${bgStyle} bg-opacity-50 grid place-items-center">
    <div class="card border-dark mb-3" style="min-width: 32rem; min-height: 18rem">
    <div class="card-body bg-dark text-center">
      <h5 class="card-title display-3 mt-5 mb-5">${message}</h5>
      <button id="try-again-button" type="button" class="btn btn-outline-success">Try Again?</button>
    </div>
  </div>
    </div>
    `
    )
}
//End Template Section

/**
 * 
 * Variable Declaration
 * 
 */
let counter = 0;

const  isActive = true;

const player1 = {
    name: "Player 1",
    active: false,
    playerIcon: '♠️',
    positionArray: []
}

const player2 = {
    name: "Player 2",
    active: false,
    playerIcon: '♦️',
    positionArray: []
}
//End Variable Declaration

/**
 * 
 * Functions
 * 
 */
function checkWinner(player){
        const winningCombinations = [
        [0, 1, 2], 
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6],
        ];

        player.positionArray.sort()
        
        for (let i = 0; i < winningCombinations.length; i++) {     
            const [a, b, c] = winningCombinations[i];

            if (player.positionArray.includes(a) && player.positionArray.includes(b) && player.positionArray.includes(c)) {
                $('#root').append(overlay(player.name));
                return ; 
            }
            if(counter === 8){
                $('#root').append(overlay());
                return ; 
            }
        }
        
        counter++
        return 'go on';        
}
//End of Functions

/**
 * 
 * Jquery
 * 
 */
$(function () {
    // injects templates to html
    $("#root").html(board())

    //setting player 1 as active player
    player1.active = isActive

    //squares onClick event
    $(".square").on('click', function(){

        /**
         * Checks if current square is occupied 
         */
        if($(this).html()){
            $('#error-message').html('Occupied Square')
            return
        }

        /**
         * Player 1 Move
         */
        const squarePosition = parseInt($(this).attr('data-square-value'))
        if(player1.active){
            $(this).html(player1.playerIcon)
            $('#error-message').html('')
            player1.positionArray.push(squarePosition)
            checkWinner(player1)
            player1.active = false;
            player2.active = isActive;

        }

        /**
         * Player 2 Move
         */
        else{
            $(this).html(player2.playerIcon)
            $('#error-message').html('')
            player2.positionArray.push(squarePosition)
            checkWinner(player2)
            player2.active = false;
            player1.active = isActive;

        }

    })

    /**
     * Try again functionality
     */
    $(document).on('click', '#try-again-button', function(){
        /**
         * Resetting player 1
         */
        player1.active = true;
        player1.positionArray = [];
        
        /**
         * Resetting player 2
         */
        player2.active = false;
        player2.positionArray = [];

        /**
         * Resetting board 
         */
        $("#overlay").remove();
        $('.square').html('');
        counter = 0;
    })
});
//End of JQuery