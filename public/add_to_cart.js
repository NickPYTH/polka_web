function remove_warning_toast(obj=null){
    if (obj != null)
        document.getElementById("warning_toast").remove();
}

function payment_modal_open(obj){
    let max_count_items = Number(document.getElementById("max_count_items").textContent);
    let root = document.getElementById("root");
    let temp = document.getElementById('cart_list').childNodes;
    let count_items = 0;
    
    for (var i = 0; i < temp.length; i++) {
        if (String(temp[i]) ==  "[object HTMLDivElement]"){
            count_items += 1;
        } 
    }

    if ((Number(temp.length)/3) == 0){
        var item = `<div id="warning_toast" class="toast toast-warning"><button class="btn btn-clear float-right" onclick="remove_warning_toast(this)"></button><p>Ваша корзина пуста</p></div>`;
        if (document.getElementById("warning_toast") == null){
            root.insertAdjacentHTML("afterBegin", item);
        }
    }
    else{
        remove_warning_toast();
        var modal = document.getElementById("payment_modal");
        modal.classList.add("active");
        document.getElementById("items_counter").value = max_count_items;
        for (var i = 1; i <= max_count_items; i++) {
            let tmp = document.getElementById("item_"+i);
            if (tmp != null){
                var item = `
                <div class="chip">
                    <div >${tmp.textContent}</div>
                    <input name="payment_item_${i}" style="display: none;" value="${tmp.textContent}"/>
                </div>
                `;
                document.getElementById("payment_cart").insertAdjacentHTML("afterBegin", item);
            }
        }
    }
}

function payment_modal_close(){
    document.getElementById("payment_modal").classList.remove("active");
    var element = document.getElementById("payment_cart");
    while (element.firstChild) {
        element.removeChild(element.firstChild);
    }
}

function remove_item(obj, id_){
    var remove_obj = document.getElementById("item_in_cart_"+id_)
    remove_obj.remove();
    var cart_counter = document.getElementById("cart_id");
    cart_counter.setAttribute("data-badge", Number(cart_counter.getAttribute("data-badge"))-1);
}

function remove_all_item(){
    var element = document.getElementById("cart_list");
    while (element.firstChild) {
        element.removeChild(element.firstChild);
    }
    var cart_counter = document.getElementById("cart_id");
    cart_counter.setAttribute("data-badge", 0);
}

function addItem(btn, item){
    var cart_counter = document.getElementById("cart_id");
    var cart_list = document.getElementById("cart_list");
    cart_counter.setAttribute("data-badge", Number(cart_counter.getAttribute("data-badge"))+1);
    var current_counter = cart_counter.getAttribute("data-badge");
    document.getElementById("max_count_items").textContent = Number(document.getElementById("max_count_items").textContent)+1;
    var item = `
    <div id="item_in_cart_${current_counter}" class="chip">
      <img src="/favicon.png" class="avatar avatar-sm" alt="">
      <div id="item_${current_counter}">${item}</div>
      <a class="btn btn-clear" onclick="remove_item(this, ${current_counter});" aria-label="Close" role="button"></a>
    </div>
    `;
    

    cart_list.insertAdjacentHTML("afterBegin", item);


}
