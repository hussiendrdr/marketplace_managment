function copyToClipBoard(param) {
    console.log(param);
    navigator.clipboard.writeText(param);
}

var sub_btn=document.getElementById("btn_append");

$( document ).ready( function() {
    
    $(sub_btn).click(function () {
        console.log("hi");
        e.preventDefault();
    });
    // Supplier Section
    $("#supplier_contact_whatsaap").keyup(function () {
        var whatsaap=$('#supplier_contact_whatsaap').val();
        // console.log(whatsaap);
        $('#whatsaap').val(whatsaap);
        $('#whatsaapLink').attr("href", whatsaap);
    });
    $("#vat_number").keyup(function () {
        var vat=$('#vat_number').val();
        // console.log(whatsaap);
        $('#vat').val(vat);
        $('#vatLink').attr("href", vat);
    });
    $("#supplier_catelouge").keyup(function () {
        var cateloge=$('#supplier_catelouge').val();
        // console.log(cateloge);
        $('#cateloge').val(cateloge);
        $('#catelogeLink').attr("href", cateloge);
    });
    $("#supplier_fixed_quotation1").keyup(function () {
        var quotation1=$('#supplier_fixed_quotation1').val();
        // console.log(quotation1);
        $('#quotation1').val(quotation1);
        $('#quotation1Link').attr("href", quotation1);
    });
    $("#supplier_fixed_quotation2").keyup(function () {
        var quotation2=$('#supplier_fixed_quotation2').val();
        // console.log(quotation2);
        $('#quotation2').val(quotation2);
        $('#quotation2Link').attr("href", quotation2);
    });
    $("#factory_location").keyup(function () {
        var factory=$('#factory_location').val();
        // console.log(factory);
        $('#factory').val(factory);
        $('#factoryLink').attr("href", factory);
    });
    $("#office_location").keyup(function () {
        var office=$('#office_location').val();
        // console.log(office);
        $('#office').val(office);
        $('#officeLink').attr("href", office);
    });
    
    
    /////////////////////////////////////////////////////
    // Customer Section
    $("#customer_contact_whatsaap").keyup(function () {
        var cwhatsaap=$('#customer_contact_whatsaap').val();
        // console.log(whatsVaule);
        $('#cwhatsaap').val(cwhatsaap);
        $('#cwhatsaapLink').attr("href", cwhatsaap);
    });
    $("#customer_brand_book").keyup(function () {
        var brand=$('#customer_brand_book').val();
        // console.log(whatsVaule);
        $('#brand').val(brand);
        $('#brandLink').attr("href", brand);
    });
    $("#customer_product_designs").keyup(function () {
        var design=$('#customer_product_designs').val();
        // console.log(whatsVaule);
        $('#design').val(design);
        $('#designLink').attr("href", design);
    });
    $("#customer_current_products").keyup(function () {
        var current=$('#customer_current_products').val();
        // console.log(whatsVaule);
        $('#current').val(current);
        $('#currentLink').attr("href", current);
    });
    $("#delivery_location").keyup(function () {
        var delivery=$('#delivery_location').val();
        // console.log(whatsVaule);
        $('#delivery').val(delivery);
        $('#deliveryLink').attr("href", delivery);
    });
    /////////////////////////////////////////////////////
    // Process Section
    $("#product_design").keyup(function () {
        var design=$('#product_design').val();
        // console.log(whatsVaule);
        $('#design').val(design);
        $('#designLink').attr("href", design);
    });
    $("#cliche_die_cut").keyup(function () {
        var cliche=$('#cliche_die_cut').val();
        // console.log(whatsVaule);
        $('#cliche').val(cliche);
        $('#clicheLink').attr("href", cliche);
    });
    $("#supplier_quotation").keyup(function () {
        var quotation=$('#supplier_quotation').val();
        // console.log(whatsVaule);
        $('#quotation').val(quotation);
        $('#quotationLink').attr("href", quotation);
    });
});

