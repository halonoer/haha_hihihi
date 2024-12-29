<div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label>Tanggal (DatePicker)</label>
                    <input type="text" class="form-control datepicker datetimepicker-input" data-toggle="datetimepicker" data-target=".datepicker" />
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label>Bulan (MonthPicker)</label>
                    <input type="text" class="form-control monthpicker datetimepicker-input" data-toggle="datetimepicker" data-target=".monthpicker" />
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label>Tahun (YearPicker)</label>
                    <input type="text" class="form-control yearpicker datetimepicker-input" data-toggle="datetimepicker" data-target=".yearpicker" />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Periode Tahun (YearRangePicker)</label>
                    <div class="input-group">
                        <input type="text" class="form-control startyear datetimepicker-input" data-toggle="datetimepicker" data-target=".startyear" />
                        <div class="input-group-append">
                            <span class="input-group-text">s/d</span>
                        </div>
                        <input type="text" class="form-control endyear datetimepicker-input" data-toggle="datetimepicker" data-target=".endyear" />
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Periode Tanggal (DateRangePicker)</label>
                    <div class="input-group">
                        <input type="text" class="form-control startdate datetimepicker-input" data-toggle="datetimepicker" data-target=".startdate" />
                        <div class="input-group-append">
                            <span class="input-group-text">s/d</span>
                        </div>
                        <input type="text" class="form-control enddate datetimepicker-input" data-toggle="datetimepicker" data-target=".enddate" />
                    </div>
                </div>
            </div>
        </div>
        <script>
    $(document).ready(function(){
        setDatePicker()
        setDateRangePicker(".startdate", ".enddate")
        setMonthPicker()
        setYearPicker()
        setYearRangePicker(".startyear", ".endyear")
    })
    </script>