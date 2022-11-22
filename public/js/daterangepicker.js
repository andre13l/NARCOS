$('input[name="daterange"]').daterangepicker({
    opens: 'center',
    autoUpdateInput: false,
    cancelButtonClasses: 'button-secondary',
    locale: {
      format: 'DD/MM/YYYY'
    }
  
  }, (start, end, label) => {
    minDate = start.format('YYYY-MM-DD');
    maxDate = end.format('YYYY-MM-DD');
    filterArticles();
});
  
$('input[name="daterange"]').on('apply.daterangepicker', function(e, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
});

$('#daterangeMobile').daterangepicker({
  opens: 'center',
  autoUpdateInput: false,
  cancelButtonClasses: 'button-secondary',
  locale: {
    format: 'DD/MM/YYYY'
  }

}, (start, end, label) => {
  minDate = start.format('YYYY-MM-DD');
  maxDate = end.format('YYYY-MM-DD');
  filterArticles();
});


const birthDate12Years = new Date();
birthDate12Years.setFullYear(birthDate12Years.getFullYear() - 12);

const birthDate18Years = new Date();
birthDate18Years.setFullYear(birthDate18Years.getFullYear() - 18);

const birthDatePicker = $('input[name=birthDatePicker]').daterangepicker({
    opens: 'center',
    singleDatePicker: true,
    autoUpdateInput: false,
    showDropdowns: true,
    cancelButtonClasses: 'button-secondary',
    minDate: "01/01/1900",
    maxDate: birthDate12Years,
    startDate: select('input[name=birthDatePicker]')?.value || birthDate18Years,
    locale: {
      format: 'DD-MM-YYYY'
    }},
    (start, end, label) => select('input[name=birthDate]').value = start.format('YYYY-MM-DD')
);

$('input[name=birthDatePicker]').on('apply.daterangepicker', function(e, birthDatePicker) {
    $(this).val(birthDatePicker.startDate.format('DD-MM-YYYY'));
});

const suspensionPicker = $('input[name=suspensionPicker]').daterangepicker({
  opens: 'center',
  singleDatePicker: true,
  autoUpdateInput: false,
  showDropdowns: true,
  cancelButtonClasses: 'button-secondary',
  minDate: new Date(),
  locale: {
    format: 'DD-MM-YYYY'
  }},
  (start, end, label) => select('input[name=suspensionEndTime]').value = start.format('YYYY-MM-DD')
);

$('input[name=suspensionPicker]').on('apply.daterangepicker', function(e, suspensionPicker) {
  $(this).val(suspensionPicker.startDate.format('DD-MM-YYYY'));
});
