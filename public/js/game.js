$(document).ready(function () {
    const route = (window.location.search).split('=')[1];
    const utilisateur = $('#utilisateur').value;
    const difficulte = $('#difficulte').value;
    const gametime = 120;

    if (route === 'game') {
        initGame(utilisateur, difficulte, gametime);
    }

});

function progressBar() {
    let progressionActuelle = $('#progression').css('width');
    console.log(progressionActuelle);
    if (parseFloat(progressionActuelle.slice(0, -2)) >= parseFloat(widthProgressBar.slice(0, -2))) {
        clearInterval(interval);
    } else {
        let actuelleWidth = parseFloat(progressionActuelle.slice(0, -2));
        let nouvelleWidth = (actuelleWidth + progressPercent).toString() + 'px';
        $('#progression').css('width', nouvelleWidth);
    }
}

function testWin(tiles, timeout, interval) {
    clearInterval(interval)
    clearTimeout(timeout);
    // TODO : FINIR le test
}

function initGame(utilisateur, difficulte, time) {
    let tiles = $('.fruit').length;
    let firstTile = ''
    let secondTile = '';

    let timer = setTimeout(function () {
        $('.fruit img').unbind('click');
        // TODO : FIN de partie
    }, 12000);

    const progressBarElement = $('#progress-bar');
    widthProgressBar = ((tiles / 4 * 100) + (tiles / 4 * 10)).toString() + 'px';
    progressBarElement.css('width', widthProgressBar);

    progressPercent = ((tiles / 4 * 100) + (tiles / 4 * 10)) / time;
    interval = setInterval(progressBar, 1000)

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

                    if (tiles === 0) testWin(tiles, timer, interval);

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

function sendResults() {

}
