@extends('layout.app')

@section('title')
    Fun
@endsection

@section('content')
    <div class="container pt-20 mx-auto px-4">
        <div class="max-w-2xl mx-auto mb-3">
            <h1 class="text-xl font-semibold text-center mb-2 dark:text-gray-100">Jeu de Mémoire</h1>
            
            <div class="bg-blue-50 dark:bg-gray-800 p-3 rounded-lg mb-3">
                <h2 class="text-lg font-medium mb-2 dark:text-gray-100">Comment jouer ?</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Retournez deux cartes à la fois pour trouver les paires correspondantes. Le jeu est terminé lorsque toutes les paires sont trouvées. Faites travailler votre mémoire et amusez-vous !
                </p>
                
                <div class="flex flex-col items-center md:flex-row gap-4 mb-4">
                    <select id="difficulty" class="bg-white dark:bg-gray-700 rounded-lg px-3 py-2 text-gray-700 dark:text-gray-200">
                        <option value="6">Facile (6 paires - 40s)</option>
                        <option value="10">Moyen (10 paires - 60s)</option>
                        <option value="12">Difficile (12 paires - 90s)</option>
                    </select>
                    <button id="newGame" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Nouvelle partie</button>
                </div>

                <div class="flex items-center justify-between bg-white dark:bg-gray-700 p-3 rounded-lg">
                    <div class="text-gray-700 dark:text-gray-200">
                        Temps: <span id="timer" class="font-mono">00:00</span>
                    </div>
                    <div id="gameStatus" class="hidden text-center font-medium"></div>
                    <div class="text-gray-700 dark:text-gray-200">
                        Coups: <span id="moves" class="font-mono">0</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="memory-game" class="grid grid-cols-4 gap-2 mx-auto hidden" style="width: fit-content;">
            @for ($i = 1; $i <= 6; $i++)
                <div class="memory-card w-[60px] h-[60px]" data-card="{{ $i }}">
                    <div class="relative w-full h-full cursor-pointer transform transition-transform duration-300">
                        <div class="card-front absolute w-full h-full bg-blue-400 dark:bg-blue-600 rounded-sm shadow-sm hover:bg-blue-500 dark:hover:bg-blue-700"></div>
                        <div class="card-back absolute w-full h-full bg-white dark:bg-gray-800 rounded-sm flex items-center justify-center text-sm font-medium hidden">
                            {{ $i }}
                        </div>
                    </div>
                </div>
                <!-- ... duplicate card ... -->
            @endfor
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let timer = null;
            let seconds = 0;
            let moves = 0;
            let hasFlippedCard = false;
            let lockBoard = false;
            let firstCard, secondCard;
            let gameStarted = false;
            let matchedPairs = 0;
            let totalPairs = 0;
            
            function updateTimer() {
                if (!gameStarted) return;
                
                const minutes = Math.floor(seconds / 60);
                const remainingSeconds = seconds % 60;
                const timeDisplay = `${minutes.toString().padStart(2, '0')}:${remainingSeconds.toString().padStart(2, '0')}`;
                document.getElementById('timer').textContent = timeDisplay;
                
                const difficulty = parseInt(document.getElementById('difficulty').value);
                const timeLimit = difficulty === 8 ? 40 : difficulty === 12 ? 60 : 90;
                
                if (seconds >= timeLimit) {
                    endGame(false);
                    return;
                }
                seconds++;
            }

            function endGame(won) {
                clearInterval(timer);
                gameStarted = false;
                const statusDiv = document.getElementById('gameStatus');
                statusDiv.classList.remove('hidden');
                
                if (won) {
                    statusDiv.textContent = `Bravo ! Partie gagnée en ${document.getElementById('timer').textContent}`;
                    statusDiv.className = 'text-green-600 dark:text-green-400 font-medium';
                } else {
                    statusDiv.textContent = 'Temps écoulé ! Partie perdue';
                    statusDiv.className = 'text-red-600 dark:text-red-400 font-medium';
                }
            }

            function startGame() {
                const difficulty = parseInt(document.getElementById('difficulty').value);
                const gameContainer = document.getElementById('memory-game');
                gameContainer.innerHTML = '';

                gameContainer.className = 'grid grid-cols-4 gap-2 mx-auto';                
            
                // Reset game state
                clearInterval(timer);
                seconds = 0;
                moves = 0;
                matchedPairs = 0;
                totalPairs = difficulty;
                gameStarted = true;
                document.getElementById('moves').textContent = '0';
                document.getElementById('timer').textContent = '00:00';
                document.getElementById('gameStatus').classList.add('hidden');
                
                // Generate unique pairs
                const numbers = Array.from({ length: difficulty }, (_, i) => i + 1);
                const pairs = [...numbers, ...numbers];
                pairs.sort(() => Math.random() - 0.5);
                
                // Create cards
                pairs.forEach(number => {
                    const card = `
                        <div class="memory-card w-[60px] h-[60px]" data-card="${number}">
                            <div class="relative w-full h-full cursor-pointer transform transition-transform duration-300">
                                <div class="card-front absolute w-full h-full bg-blue-400 dark:bg-blue-600 rounded-sm shadow-sm hover:bg-blue-500 dark:hover:bg-blue-700"></div>
                                <div class="card-back absolute w-full h-full bg-white dark:bg-gray-800 rounded-sm flex items-center justify-center text-sm font-medium hidden">
                                    ${number}
                                </div>
                            </div>
                        </div>
                    `;
                    gameContainer.innerHTML += card;
                });
                
                // Start timer
                timer = setInterval(updateTimer, 1000);
                
                // Add event listeners
                document.querySelectorAll('.memory-card').forEach(card => {
                    card.addEventListener('click', flipCard);
                });
            }

            function flipCard() {
                if (!gameStarted || lockBoard || this === firstCard) return;

                this.querySelector('.card-front').classList.add('hidden');
                this.querySelector('.card-back').classList.remove('hidden');

                if (!hasFlippedCard) {
                    hasFlippedCard = true;
                    firstCard = this;
                    return;
                }

                secondCard = this;
                moves++;
                document.getElementById('moves').textContent = moves;
                checkForMatch();
            }

            function checkForMatch() {
                const isMatch = firstCard.dataset.card === secondCard.dataset.card;
                if (isMatch) {
                    matchedPairs++;
                    disableCards();
                    if (matchedPairs === totalPairs) {
                        endGame(true);
                    }
                } else {
                    unflipCards();
                }
            }

            function disableCards() {
                firstCard.removeEventListener('click', flipCard);
                secondCard.removeEventListener('click', flipCard);
                resetBoard();
            }

            function unflipCards() {
                lockBoard = true;
                setTimeout(() => {
                    firstCard.querySelector('.card-front').classList.remove('hidden');
                    firstCard.querySelector('.card-back').classList.add('hidden');
                    secondCard.querySelector('.card-front').classList.remove('hidden');
                    secondCard.querySelector('.card-back').classList.add('hidden');
                    resetBoard();
                }, 1000);
            }

            function resetBoard() {
                [hasFlippedCard, lockBoard] = [false, false];
                [firstCard, secondCard] = [null, null];
            }

            // Initialize game
            document.getElementById('newGame').addEventListener('click', startGame);
        });
    </script>
@endsection