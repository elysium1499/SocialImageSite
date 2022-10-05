$('#chooseProfile').bind('change', function() {
    var filename = $("#chooseProfile").val();
    if (/^\s*$/.test(filename)) {
        $("#noFile").text("No file chosen...");
    } else {
        $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
    }
});

$('#chooseImage').bind('change', function() {
    var filename = $("#chooseImage").val();
    if (/^\s*$/.test(filename)) {
        $("#fileNo").text("No file chosen...");
    } else {
        $("#fileNo").text(filename.replace("C:\\fakepath\\", ""));
    }
});