check_all = () => {
    var form_element = document.forms[1].length;
    for (i = 0; i < form_element - 1; i++) {
        document.forms[1].elements[i].checked = true;
    }
    //เลือกทั้งหมดของ checkbox
}
check_cancel_all = () => {
        var form_element = document.forms[1].length - 1;
        for (i = 0; i < form_element; i++) {
            document.forms[1].elements[i].checked = false;
        }
    }
    //ยกเลิกทั้งหมดของ checkbox