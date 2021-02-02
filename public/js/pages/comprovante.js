function abs() {
    var divContents = $("#body").html();
    var printWindow = window;
    printWindow.document.write(divContents);
    printWindow.document.close();
    printWindow.print();
}