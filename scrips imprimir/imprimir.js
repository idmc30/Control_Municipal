$(document).on('click', '#imprimir1', function(e){
	e.preventDefault();
        var contents = $("#DivHR").html();
        var contents2 = $("#divpredio4").html();
//        alert(contents);
//        $("div#Divlistap").printArea();
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html><head><title>DIV Contents</title>');
        frameDoc.document.write('</head><body>');
        //Append the external CSS file.
        frameDoc.document.write('<link href="style.css" rel="stylesheet" type="text/css" />');
        frameDoc.document.write('<h1>Reporte Predial</h1>');
        //Append the DIV contents.
        frameDoc.document.write(contents);
        frameDoc.document.write('<br> <br>');
        frameDoc.document.write(contents2);
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);



});