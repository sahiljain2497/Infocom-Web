function invoiceType(){
    let value = document.getElementById('invoice_type').value;
    console.log(value);
    if(value == 'Incoming')
    {
        $('.sender-row').css('display','flex');
        $('.reciever-row').css('display','none');
    }
    else
    {
        $('.sender-row').css('display','none');
        $('.reciever-row').css('display','flex');
    }
}
