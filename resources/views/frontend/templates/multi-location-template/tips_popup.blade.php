 <div id="tipModal" class="backdrop_popup">
     <div id="tippopoverd">
         <span class="popup_close">🗙</span>
         <div class="tip_popup_header">
             <h2></h2>
         </div>
         <input type="hidden" id="tipDataID" value="">
         <div class="tip_popup_body">
             <p>Your Heartfelt Contribution</p>
             <div class="tip_custom_input">
                 $ <input type="text" min="1" id="tipCustomAmount" oninput="validateInputTipsAmount(this)">
             </div>
             <div class="tip_popup_action">
                 <button type="button" class="add_tip_btn main_btn support_btn">Add</button>
             </div>
         </div>
     </div>
 </div>

 <script>
     function validateInputTipsAmount(input) {
         input.value = input.value.replace(/^0+(?!\.)/, '');
         const validNumber = /^[0-9]*\.?[0-9]*$/;
         if (!validNumber.test(input.value)) {
             input.value = input.value.slice(0, -1);
         }
         if (parseFloat(input.value) < 1 && !input.value.startsWith("0.")) {
             input.value = '';
         }
         input.addEventListener('blur', () => {
             if (input.value !== '') {
                 input.value = parseFloat(input.value).toFixed(2);
             }
         });
     }
 </script>
