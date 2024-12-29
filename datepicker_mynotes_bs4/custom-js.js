function setDatePicker(){
  $(".datepicker").datetimepicker({
    format: "DD-MM-YYYY HH:mm:ss",
    useCurrent: true
  })
}

function setTglDtngBD(){
  $(".tgldtng").datetimepicker({
    format: "DD-MM-YYYY HH:mm:ss",
    useCurrent: true
  })
}

// form jadwaldtgmaterial.php
function setTgljkm(){
  $(".tgldocjkm").datetimepicker({
    format: "DD-MM-YYYY",
    useCurrent: false
  })
}
// form jadwaldtgmaterial.php
function setTglRcnDtg(){
  $(".tglrcndtng").datetimepicker({
    format: "DD-MM-YYYY",
    useCurrent: false
  })
}
// form jadwaldtgmaterial.php
function setTglDtgjkm(){
  $(".tgldtngjkm").datetimepicker({
    format: "DD-MM-YYYY",
    useCurrent: false
  })
}
//================= po shipping ==============//
function setTglLC(){
  $(".tgllc").datetimepicker({
    format: "DD-MM-YYYY HH:mm:ss",
    useCurrent: true
  })
}

function setTglInvoice(){
  $(".tglinvoice").datetimepicker({
    format: "DD-MM-YYYY HH:mm:ss",
    useCurrent: true
  })
}

function setTglETD(){
  $(".tgletd").datetimepicker({
    format: "DD-MM-YYYY HH:mm:ss",
    useCurrent: true
  })
}

function setTglETA(){
  $(".tgleta").datetimepicker({
    format: "DD-MM-YYYY HH:mm:ss",
    useCurrent: true
  })
}

function setTglPIB(){
  $(".tglpib").datetimepicker({
    format: "DD-MM-YYYY HH:mm:ss",
    useCurrent: true
  })
}

function setTglBL(){
  $(".tglbl").datetimepicker({
    format: "DD-MM-YYYY HH:mm:ss",
    useCurrent: true
  })
}

function setTglSPPB(){
  $(".tglsppb").datetimepicker({
    format: "DD-MM-YYYY HH:mm:ss",
    useCurrent: true
  })
}

function setTglCOO(){
  $(".tglcoo").datetimepicker({
    format: "DD-MM-YYYY HH:mm:ss",
    useCurrent: true
  })
}

function setTglAkseptasi(){
  $(".tglakseptasi").datetimepicker({
    format: "DD-MM-YYYY HH:mm:ss",
    useCurrent: true
  })
}

//==============================================================================//
// form cuti_add, cuti_edit
function setTglawlCt(){
  $(".tglawlct").datetimepicker({
    format: "DD-MM-YYYY",
    useCurrent: false
  })
}

// form cuti_bersama_add, cuti_bersama_edit
function setTglCB(){
  $(".tglCB").datetimepicker({
    format: "DD-MM-YYYY",
    useCurrent: false
  })
}

// form kesehatan_add, kesehatan_edit
function setTglKsht(){
  $(".tglKsht").datetimepicker({
    format: "DD-MM-YYYY",
    useCurrent: false
  })
}

// form lembur_add, lembur_edit
function setTglLbr(){
  $(".tgllbr").datetimepicker({
    format: "DD-MM-YYYY",
    useCurrent: false
  })
}


// form SPPD_add, SPPD_edit
function setTglSPPD(){
  $(".tglsppd").datetimepicker({
    format: "DD-MM-YYYY",
    useCurrent: false
  })
}
// form SPPD_edit
function setTglSPPD2(){
  $(".tglsppd2").datetimepicker({
    format: "DD-MM-YYYY",
    useCurrent: false
  })
}


function setDateRangePicker(input1, input2){
  $(input1).datetimepicker({
    format: "DD-MM-YYYY",
    useCurrent: false
  })
  $(input1).on("change.datetimepicker", function (e) {
    $(input2).val("")
        $(input2).datetimepicker('minDate', e.date);
    })
  $(input2).datetimepicker({
    format: "DD-MM-YYYY",
    useCurrent: false
  })
}
function setMonthPicker(){
  $(".monthpicker").datetimepicker({
    format: "MM",
    useCurrent: false,
    viewMode: "months"
  })
}
function setYearPicker(){
  $(".yearpicker").datetimepicker({
    format: "YYYY",
    useCurrent: false,
    viewMode: "years"
  })
}
function setYearMonthPicker(){
  $(".yearmonthpicker").datetimepicker({
    format: "YYYY-MM",
    useCurrent: false,
    viewMode: "months",
    minViewMode: "months"
  })
}
function setYearRangePicker(input1, input2){
  $(input1).datetimepicker({
    format: "YYYY",
    useCurrent: false,
    viewMode: "years"
  })
  $(input1).on("change.datetimepicker", function (e) {
    $(input2).val("")
        $(input2).datetimepicker('minDate', e.date);
    })
  $(input2).datetimepicker({
    format: "YYYY",
    useCurrent: false,
    viewMode: "years"
  })
}
function setYearMonthRangePicker(inputp1, inputp2){
  $(inputp1).datetimepicker({
    format: "YYYY-MM",
    useCurrent: false,
    viewMode: "months",
    minViewMode: "months"
  })
  $(inputp1).on("change.datetimepicker", function (e) {
    $(inputp2).val("")
        $(inputp2).datetimepicker('minDate', e.date);
    })
  $(inputp2).datetimepicker({
    format: "YYYY-MM",
    useCurrent: false,
    viewMode: "months",
    minViewMode: "months"
  })
}
