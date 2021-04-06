$(document).ready(function () {
    const route = (window.location.search).split('=')[1];
    const utilisateur = $('#utilisateur')[0].innerText;
    const difficulte = $('#difficulte')[0].innerText;
    const gametime = 120;

    if (route === 'game') {
        initGame(utilisateur, difficulte, gametime);
    }

});

function progressBar() {
    let progressionActuelle = $('#progression').css('width');
    if (parseFloat(progressionActuelle.slice(0, -2)) >= parseFloat(widthProgressBar.slice(0, -2))) {
        clearInterval(interval);
    } else {
        let actuelleWidth = parseFloat(progressionActuelle.slice(0, -2));
        let nouvelleWidth = (actuelleWidth + progressPercent).toString() + 'px';
        $('#progression').css('width', nouvelleWidth);
        counter--;
    }
}

function testWin(timeout, interval, utilisateur, difficulte, gametime) {
    clearInterval(interval);
    clearTimeout(timeout);

    // TODO : FINIR le test
    const time = gametime - counter;
    sendResults(utilisateur, difficulte, 1, time);
}

function initGame(utilisateur, difficulte, time) {
    let tiles = $('.fruit').length;
    let firstTile = '';
    let secondTile = '';
    counter = time;

    let timer = setTimeout(function () {
        $('.fruit img').unbind('click');
        // TODO : FIN de partie
        sendResults(utilisateur, difficulte, 0, time);
    }, 120000);

    const progressBarElement = $('#progress-bar');
    widthProgressBar = ((tiles / 4 * 100) + (tiles / 4 * 10)).toString() + 'px';
    progressBarElement.css('width', widthProgressBar);

    progressPercent = ((tiles / 4 * 100) + (tiles / 4 * 10)) / time;
    interval = setInterval(progressBar, 1000);

    $('.fruit img').hover(function () {
        $(this).parent().css('background-color', 'limegreen');
    }, function () {
        $(this).parent().css('background-color', 'dodgerblue');
    });

    $('.fruit img').click(function () {
        if (firstTile === '') {
            $(this).css('opacity', 1);
            firstTile = $(this).attr('class');
        } else {
            $(this).css('opacity', 1);
            secondTile = $(this).attr('class');

            setTimeout(function () {
                if (firstTile === secondTile && firstTile !== '') {
                    tiles -= 2;

                    if (tiles === 0) testWin(timer, interval, utilisateur, difficulte, time);

                } else {
                    $('.fruit img.' + firstTile).css('opacity', 0);
                    $('.fruit img.' + secondTile).css('opacity', 0);
                }

                firstTile = '';
                secondTile = '';
            }, 500);
        }
    });
}

function sendResults(utilisateur, level, win, temps) {
    $.post('index.php?route=end-game', {
        utilisateur: utilisateur,
        level: level,
        win: win,
        temps: temps
    }).done(function (data) {
        if (win === 1) {
            alert('Vous avez gagné et vos résultats sont enregistrés');
        } else {
            alert('Vous avez perdu et vos résultats sont tout de même enregistrés');
        }
        window.location.replace("index.php");
    });
}
