$(function () {
    disableButton();
});

function disableButton() {
    $(".btnSubmit").on({
        click: function () {
            this.disabled=true;
            this.form.submit();
        }
    });

}
