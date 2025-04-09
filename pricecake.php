<?php 
   session_start(); 
   include("connect.php");


?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Little Bakery</title>
    <link rel="stylesheet" href="pricecake.css">
   
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="https://i.postimg.cc/rzD6Dt39/logocake.png" alt="Little Bakery Logo">
            <h1>Little Bakery</h1>
        </div>
        <div class="search-bar">
            
            <input type="text" placeholder="ค้นหา...">
        </div>
        <div class="header-icons">
        <?php if (isset($_SESSION['username'])): ?>
        <!-- ถ้ามี $_SESSION['username'] -->
        <p><?php echo htmlspecialchars($_SESSION['username']); ?></p>
        <a>/</a>
        <a href="logout.php">ออกจากระบบ</a>
        <?php else: ?>
        <!-- ถ้าไม่มี $_SESSION['username'] -->
        <a href="login.php">เข้าสู่ระบบ</a>
        <a>/</a>
        <a href="register.php">ลงทะเบียน</a>
        <?php endif; ?>
        <h2>|</h2>
        <div id="cart-icon">
          <h1 href="#" onclick="toggleCart()">🛒</h1>
          <span id="cart-count">0</span>
        </div>
        <div id="cart-dropdown">
          <div id="cart-items"></div>
          <div id="cart-total" class="cart-total">รวม: 0 บาท</div>
          <button id="checkout-button" onclick="goToCart()">ไปที่ตะกร้า</button>
        </div>
      </div>
    </div>
   
    <nav class="nav-menu">
        <button><h3><a href="littlebakery.php">Little</a></h3></button>
        <button><h3><a href="promotion.php">Promotion</a></h3></button>
        <button><h3><a href="pound.php">Pound Cake</a></h3></button>
        <button><h3><a href="ice.php">Ice Cream Cake</a></h3></button>
        <button><h3><a href="#">Piece of cake</a></h3></button>
        <button><h3><a href="bakery.php">Bakery</a></h3></button>
        <button><h3><a href="member.php">Member</a></h3></button>
    </nav> 

    <div class="cake-section">
        <div class="section-title"> 
            <h2>Price of cake</h2>
            
        </div>
        <div class="cake-grid">
            <div class="cake-item" data-name="chocolate" data-price="220" id="15">
                <img src="https://i.pinimg.com/736x/5d/82/fa/5d82fa532d74514840469cb40ba7ed9d.jpg" alt="เค้กแบล็คฟอเรสต์">
                <div class="cake-details">
                    <p class="cake-price">chocolate    220 บ.</p>
                    <button class="order-btn" onclick="addToCart('chocolate', 220, 'https://img.wongnai.com/p/400x0/2019/08/10/1b388707e24a42228efcb4a7cd29a94a.jpg')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="chocolate.php">ดูรายละเอียด</a></button>
            </div>
            <div class="cake-item" data-name="redvelvet " data-price="150" id="16">
                <img src="https://i.pinimg.com/736x/fd/b3/21/fdb321c04921a71fb02a40145857345c.jpg " alt="เค้กสตอเบอร์รี">
                <div class="cake-details">
                    <p class="cake-price">redvelvet   150 บ.</p>
                    <button class="order-btn" onclick="addToCart('redvelvet ', 150, 'https://image.makewebcdn.com/makeweb/m_1200x600/jKZC6GmS7/other/31.png')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="red.php">ดูรายละเอียด</a></button>
            </div>
            <div class="cake-item" data-name="Valilaa" data-price="130" id="17">
                <img src="https://bakerbynature.com/wp-content/uploads/2022/04/Golden-Vanilla-Cake-with-Vanilla-Frosting0-30.jpg   " alt="เค้กเรดเวลเวต">
                <div class="cake-details">
                    <p class="cake-price">Valilaa    130 บ.</p>
                    <button class="order-btn" onclick="addToCart('Valilaa', 130, 'https://image.makewebcdn.com/makeweb/m_1920x0/jKZC6GmS7/other/34.png?v=202405291424')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="valilaa.php">ดูรายละเอียด</a></button>
            </div>
            <div class="cake-item" data-name="strawberry" data-price="160" id="18">
                <img src="https://www.rainbownourishments.com/wp-content/uploads/2022/02/vegan-strawberry-cake-3.jpg" alt="เค้กวินลา">
                <div class="cake-details">
                    <p class="cake-price">strawberry  160 บ.</p>
                    <button class="order-btn" onclick="addToCart('strawberry', 160, 'https://image.makewebcdn.com/makeweb/m_1920x0/jKZC6GmS7/other/32.png?v=202405291424')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="strprice.php">ดูรายละเอียด</a></button>
            </div>
            <div class="cake-item" data-name="Orangegy" data-price="130" id="19">
                <img src="https://png.pngtree.com/png-clipart/20231124/original/pngtree-orange-cake-white-picture-image_13281529.png" alt="เค้กวินลา">
                <div class="cake-details">
                    <p class="cake-price">Orangegy     130 บ.</p>
                    <button class="order-btn" onclick="addToCart('Orangegy', 130, 'https://i.ibb.co/VcGchcN0/465722978-9403070069711300-5589682847167151453-n-Photoroom.png')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="oran.php">ดูรายละเอียด</a></button>
            </div>
            <div class="cake-item" data-name="Cocococo " data-price="100"id="20">
                <img src="https://www.stephiecooks.com/wp-content/uploads/2013/05/close-up-coconut-cake-slice.webp" alt="เค้กวินลา">
                <div class="cake-details">
                    <p class="cake-price">Cocococo   100 บ.</p>
                    <button class="order-btn" onclick="addToCart('Cocococo ', 100, 'https://image.makewebcdn.com/makeweb/m_1920x0/jKZC6GmS7/other/33.png?v=202405291424')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="coconu.php">ดูรายละเอียด</a></button>
            </div>
            <div class="cake-item" data-name="Buberry " data-price="130" id="21">
                <img src="https://simplyhomecooked.com/wp-content/uploads/2017/05/Berry-chantilly-cake-22.jpg" alt="เค้กวินลา">
                <div class="cake-details">
                    <p class="cake-price">Buberry   130 บ.</p>
                    <button class="order-btn" onclick="addToCart('Buberry ', 130, 'https://image.makewebcdn.com/makeweb/m_1920x0/jKZC6GmS7/other/33.png?v=202405291424')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="bule.php">ดูรายละเอียด</a></button>
            </div>
            <div class="cake-item" data-name="BlackForest " data-price="200" id="22">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiNRzxyqIjubdtMgo7NLoMm19lPqs__jEaaw&s" alt="เค้กวินลา">
                <div class="cake-details">
                    <p class="cake-price">BlackForest  200 บ.</p>
                    <button class="order-btn" onclick="addToCart('BlackForest ', 200, 'https://image.makewebcdn.com/makeweb/m_1920x0/jKZC6GmS7/other/33.png?v=202405291424')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"> <a href="blackf.php">ดูรายละเอียด</a>   </button>
            </div>
            
        </div>

    </div>

    

<script>
// ใช้ localStorage เพื่อเก็บตะกร้าสินค้า
let cart = JSON.parse(localStorage.getItem('littleBakeryCart')) || [];

function addToCart(name, price, image) {
    // ตรวจสอบว่ามีสินค้าในตะกร้าแล้วหรือไม่
    const existingItem = cart.find(item => item.name === name);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ 
            name, 
            price, 
            quantity: 1, 
            image,
            note: ""
        });
    }
    
    // บันทึกลงใน localStorage
    saveCart();
    updateCart();
    
    // Check if total items in the cart equal or exceed 8
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    if (totalItems >= 8) {
        alert("คุณสั่งสินค้าครบ 8 ชิ้นแล้ว เท่ากับ 1 pound!");
    }
}

function saveCart() {
    localStorage.setItem('littleBakeryCart', JSON.stringify(cart));
}

function updateCart() {
    const cartItemsContainer = document.getElementById('cart-items');
    const cartCountElement = document.getElementById('cart-count');
    const cartTotalElement = document.getElementById('cart-total');
    
    // ล้างรายการสินค้าที่มีอยู่
    cartItemsContainer.innerHTML = '';
    
    // คำนวณจำนวนสินค้าและราคารวม
    let totalItems = 0;
    let totalPrice = 0;
    
    cart.forEach((item, index) => {
        totalItems += item.quantity;
        totalPrice += item.price * item.quantity;
        
        const cartItemElement = document.createElement('div');
        cartItemElement.classList.add('cart-item');
        cartItemElement.innerHTML = `
            <span>${item.name}</span>
            <div class="cart-item-quantity">
                <button onclick="changeQuantity(${index}, -1)">-</button>
                <span>${item.quantity}</span>
                <button onclick="changeQuantity(${index}, 1)">+</button>
                <span>${item.price * item.quantity} บ.</span>
            </div>
        `;
        
        cartItemsContainer.appendChild(cartItemElement);
    });
    
    // อัพเดตจำนวนสินค้าและราคารวม
    cartCountElement.textContent = totalItems;
    cartTotalElement.textContent = `รวม: ${totalPrice} บาท`;
    
    // Check if total items in the cart equal or exceed 8
    if (totalItems >= 8) {
        const poundMessage = document.createElement('div');
        poundMessage.textContent = "คุณสั่งสินค้าครบ 8 ชิ้นแล้ว เท่ากับ 1 pound!";
        poundMessage.style.color = "green";
        cartItemsContainer.appendChild(poundMessage);
    }
}

function changeQuantity(index, change) {
    cart[index].quantity += change;
    
    // ลบสินค้าถ้าจำนวนเป็น 0
    if (cart[index].quantity <= 0) {
        cart.splice(index, 1);
    }
    
    saveCart();
    updateCart();
}

function toggleCart() {
    const cartDropdown = document.getElementById('cart-dropdown');
    cartDropdown.style.display = cartDropdown.style.display === 'block' ? 'none' : 'block';
}

// ปิดตะกร้าเมื่อคลิกนอกพื้นที่
document.addEventListener('click', function(event) {
    const cartDropdown = document.getElementById('cart-dropdown');
    const cartIcon = document.getElementById('cart-icon');
    
    if (!cartDropdown.contains(event.target) && !cartIcon.contains(event.target)) {
        cartDropdown.style.display = 'none';
    }
});

// เปลี่ยนหน้าไปที่ตะกร้าสินค้า
function goToCart() {
    window.location.href = 'cart.php';
}

// โหลดตะกร้าเมื่อเปิดเพจ
window.onload = function() {
    updateCart();
};
</script> 

</body>
</html>