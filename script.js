function modify_qty(val) {
    var qty = document.getElementById('qty').value;
    var new_qty = parseInt(qty,10) + val;
    
    if (new_qty < 0) {
        new_qty = 0;
		alert("sucessfully submitted");

    }
	if (new_qty > 5){
		new_qty = 5;
	}
    
    document.getElementById('qty').value = new_qty;
    return new_qty;
}
function modify_qty1(val1) {
    var qty = document.getElementById('qty1').value;
    var new_qty = parseInt(qty,10) + val1;
    
    if (new_qty < 0) {
        new_qty = 0;
    }
	if (new_qty > 5){
		new_qty = 5;
	}
    
    document.getElementById('qty1').value = new_qty;
    return new_qty;
}
function voter(){
	alert("sucessfully submitted");
	}