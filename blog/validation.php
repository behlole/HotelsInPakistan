<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <form class="form-horizontal" data-toggle="validate" role="form">
                <div class="form-group">
                    <label for="inpUsername" class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-8">
                        <input type="text" name="username" class="form-control" id="inpUsername" placeholder="Username" required="required" maxlength="55">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inpDateOfBirth" class="col-sm-4 control-label">Date of Birth</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="date" name="dateofbirth" class="form-control" id="inpDateOfBirth" placeholder="Date of Birth"  data-rule-required="true" data-rule-date="true">
                            <div class="input-group-addon">
                                <span class="fa fa-calendar fa-fw"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


.form-control-feedback {
    top: 11px;
}
jQuery.validator.setDefaults({
    highlight: function(element, errorClass, validClass) {
        if ($(element).closest('.input-group').length > 0) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-error');
        } else {
            if (element.type === "radio") {
                this.findByName(element.name).addClass(errorClass).removeClass(validClass);
            } else {
                $(element).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                if ($(element).closest('form').hasClass('form-horizontal')) {
                    $(element).closest('.form-group > div[class^="col"]').find('i.fa').remove();
                    $(element).closest('.form-group > div[class^="col"]').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
                } else {
                    $(element).closest('.form-group').find('i.fa').remove();
                    $(element).closest('.form-group').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
                }
            }
        }
    },
    unhighlight: function(element, errorClass, validClass) {
        if ($(element).closest('.input-group').length > 0) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        } else {
            if (element.type === "radio") {
                this.findByName(element.name).removeClass(errorClass).addClass(validClass);
            } else {
                if ($(element).closest('form').hasClass('form-horizontal')) {
                    $(element).closest('.form-group > div[class^="col"]').find('i.fa').remove();
                    $(element).closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                } else {
                    $(element).closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                    $(element).closest('.form-group').find('i.fa').remove();
                    $(element).closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
                }
            }
        }
    },
    errorPlacement: function(error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else if (element.parent('.radio-inline').length) {
            error.insertAfter(element.parent().parent());
        } else {
            error.insertAfter(element);
        }
    },
    errorElement: 'span',
    errorClass: 'help-block',
    ignore: ''
});
$('form[data-toggle="validate"]').validate();