let currentPlaylist = [];
let shufflePlaylist = [];
let tempPlaylist = [];
let audioElement;
let mouseDown = false;
let currentIndex = 0;
let repeat = false;
let shuffle = false;
var userLoggedIn;

$(document).click(function(click) {
    var target = $(click.target);

    if(!target.hasClass("item") && !target.hasClass("optionsButton"))
    {
        hideOptionsMenu();
    }
});

$(window).scroll(function(){
    hideOptionsMenu();
});

$(document).on("change", "select.playlist", function() {
    var playlistId = $(this).val();
    var songId = $(this).prev(".songId").val();

    $.post("assets/src/includes/handlers/ajax/addToPlaylist.php", { playlistId: playlistId, songId: songId }, function(error) {
        if(error != ""){
            console.log(error);
            return;
        }
        hideOptionsMenu();
        $("select.playlist").val("");
    });
});

function updateEmail(emailClass)
{
    let emailValue = $("." + emailClass).val();

    $.post("assets/src/includes/handlers/ajax/updateEmail.php", { email: emailValue, username: userLoggedIn }, function(response) {
        $("." + emailClass).nextAll(".message").text(response);
    });
}

function updatePassword(oldPasswordClass,newPasswordClass1,newPasswordClass2)
{
    let oldPassword = $("." + oldPasswordClass).val();
    let newPassword1 = $("." + newPasswordClass1).val();
    let newPassword2 = $("." + newPasswordClass2).val();

    $.post("assets/src/includes/handlers/ajax/updatePassword.php", { oldPassword: oldPassword, newPassword1: newPassword1 , newPassword2: newPassword2 ,username: userLoggedIn }, function(response) {
        $("." + oldPasswordClass).nextAll(".message").text(response);
    });
}

function logout()
{
    $.post("assets/src/includes/handlers/ajax/logout.php", function(error) {
        if(error != ""){
            console.log(error);
            return;
        }
        location.reload();
    });
}


function openPage(url){
    if (url.indexOf("?") == -1){
        url = url + "?";
    }
    let encodedUrl = encodeURI(url + '&userLoggedIn=' + userLoggedIn);
    $("#mainContent").load(encodedUrl);
    $("body").scrollTop(0);
    history.pushState(null, null, url);
}

function removeFromPlaylist(button, playlistId)
{
    var songId = $(button).prevAll(".songId").val();

    $.post("assets/src/includes/handlers/ajax/removeFromPlaylist.php", { playlistId: playlistId, songId: songId}, function(error) {
        if(error != ""){
            console.log(error);
            return;
        }
        openPage("playlist.php?id=" + playlistId);
    });

}

function createPlaylist()
{
    let popup = prompt("Please enter the name of your playlist");

    if(popup != null)
    {
        $.post("assets/src/includes/handlers/ajax/createPlaylist.php", { name: popup, username: userLoggedIn}, function(error) {
            if(error != ""){
                console.log(error);
                return;
            }
            openPage("yourMusic.php");
        });
    }
}

function playFirstSong()
{
    setTrack(tempPlaylist[0], tempPlaylist, true);
}


function deletePlaylist(playlistId)
{
    var prompt = confirm("Are you sure you want to delete this playlist?");

    if(promt = true)
    {
        $.post("assets/src/includes/handlers/ajax/deletePlaylist.php", { playlistId: playlistId}, function(error) {
            if(error != ""){
                console.log(error);
                return;
            }
            openPage("yourMusic.php");
        });
    }
}

function hideOptionsMenu()
{
    var menu = $(".optionsMenu");
    if(menu.css("display") != "none")
    {
        menu.css("display", "none");
    }
}


function showOptionsMenu(button) {
    var songId = $(button).prevAll(".songId").val();
    var menu = $(".optionsMenu");
    var menuWidth = menu.width();
    menu.find(".songId").val(songId);

    var scrollTop = $(window).scrollTop(); // Distance from top of window to top of document
    var elementOffset = $(button).offset().top; // Distance from top of document

    var top = elementOffset - scrollTop;
    var left = $(button).position().left;

    menu.css({ "top": top+"px", "left": left - menuWidth + "px", "display": "inline" });
}


function formatTime(seconds)
{
    let time = Math.round(seconds);
    let minutes = Math.floor(time / 60);
    let second = time - (minutes * 60);

    let extraZero;
    if (second < 10)
    {
        extraZero = "0";
    }
    else {
        extraZero = "";
    }
    return minutes + ":" + extraZero + second;
}

function updateTimeProgressBar(audio){
    $(".progressTime.current").text(formatTime(audio.currentTime));
    $(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));

    let progress = (audio.currentTime / audio.duration) * 100;
    $(".playbackBar .progress").css("width", progress + "%");
}

function updateVolumeProgressBar(audio){
    let volume = (audio.volume * 100);
    $(".volumeBar .progress").css("width", volume + "%");
}

function Audio() {

    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    this.audio.addEventListener("ended", function(){
        nextSong();
    });

    this.audio.addEventListener("canplay", function(){
        let duration = formatTime(this.duration);
        $(".progressTime.remaining").text(duration);
    });

    this.audio.addEventListener("timeupdate", function() {
        if (this.duration){
            updateTimeProgressBar(this);
        }
    });

    this.audio.addEventListener("volumechange", function() {
        updateVolumeProgressBar(this);
    });

    this.setTrack = function(track) {
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    }

    this.play = function() {
        this.audio.play();
    }

    this.pause = function () {
        this.audio.pause();
    }

    this.setTime = function(seconds) {
        this.audio.currentTime = seconds;
    }
}