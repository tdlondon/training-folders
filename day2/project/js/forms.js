/**
 * @author  Training Dragon
 * @name    forms.html
 * @desc    this will show new form elements and attributes,
 *          custom attributes and real time manipulation
 */
// wrap all your code in an iife
(function(){
var
    numA = document.getElementById("numA"),
    numB = document.querySelector("#numB"), // using a css selector
    resBtn = document.getElementById("resBtn"),
    result = document.getElementById("result"),
    prBar = document.getElementById("prBar"),
    val = 0,

    bindSumBtn = function () {
        // element.addEventListener(event:string, handlers:function)
        resBtn.addEventListener("click", function () {
            if(numA.value !== "" && numB.value !== ""){
                var sum =
                    parseInt(numA.value, 10) +
                    parseInt(numB.value, 10)
                ;
                result.value = sum;
            } else {
                alert("please fill in the two numbers");
            }
        });//
    }, // bindSumBtn

    animatePrBar = function () {
        if(val < prBar.max){
            val += 50;
            prBar.value = val;
            setTimeout(
                // code
                function(){
                    animatePrBar();
                },
                // delay in ms
                100
            )
        } else {
            // alert("end of animation");
        }
    }, // animatePrBar

    bindPrBar = function () {
        animatePrBar();
    }, // bindPrBar


    init = function () {
        bindSumBtn();
        bindPrBar();
    }// init
;
    window.addEventListener("load",init);
})();