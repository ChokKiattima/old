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
    <link rel="stylesheet" href="pound.css">
   
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
        
        <button><h3><a href="#">Pound Cake</a></h3></button>
        <button><h3><a href="ice.php">Ice Cream Cake</a></h3></button>
        <button><h3><a href="pricecake.php">Piece of cake</a></h3></button>
        <button><h3><a href="bakery.php">Bakery</a></h3></button>
        <button><h3><a href="member.php">Member</a></h3></button>
    </nav> 

    <div class="cake-section">
        <div class="section-title">
            <h2>Pound cake</h2>
            
        </div>
        <div class="cake-grid">
            <div class="cake-item" data-name="Black Forest cake" data-price="500" id="1">
                <img src="https://i.pinimg.com/736x/de/c3/54/dec3547435d522d794358e88e86602ba.jpg" alt="เค้กแบล็คฟอเรสต์">
                <div class="cake-details">
                    <p class="cake-price">Black Forest cake    500 บ.</p>
                    <button class="order-btn" onclick="addToCart('Black Forest cake', 500, 'https://i.pinimg.com/736x/de/c3/54/dec3547435d522d794358e88e86602ba.jpg')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="bf.php">ดูรายละเอียด</a></button>
            </div>
            <div class="cake-item" data-name="Strawberry Cake" data-price="400" id="2">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8-L2SJZdN6m6mRN9RjI9WMhLJxLn8T3XY8A&s" alt="เค้กสตอเบอร์รี">
                <div class="cake-details">
                    <p class="cake-price">Strawberry Cake    400 บ.</p>
                    <button class="order-btn" onclick="addToCart('Strawberry Cake', 400, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8-L2SJZdN6m6mRN9RjI9WMhLJxLn8T3XY8A&s')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="strawberry.php">ดูรายละเอียด</a></button>
            </div>
            <div class="cake-item" data-name="Red Velvet Cake" data-price="600"id="3">
                <img src="https://i.pinimg.com/736x/15/89/bc/1589bc3e846d7e8ad3c69645ad80ea39.jpg" alt="เค้กเรดเวลเวต">
                <div class="cake-details">
                    <p class="cake-price">Red Velvet Cake    600 บ. </p>
                    <button class="order-btn" onclick="addToCart('Red Velvet Cake', 600, 'https://i.pinimg.com/736x/15/89/bc/1589bc3e846d7e8ad3c69645ad80ea39.jpg')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="redv.php">ดูรายละเอียด</a></button>
            </div>
            <div class="cake-item" data-name="Vanilla Cake" data-price="350" id="4">
                <img src="https://preview.redd.it/aonrlowt39b61.jpg?auto=webp&s=ef2605e6e3a0c5373fecc3126d01940dae70929b" alt="เค้กวินลา">
                <div class="cake-details">
                    <p class="cake-price">Vanilla Cake    350 บ.</p>
                    <button class="order-btn" onclick="addToCart('Vanilla Cake', 350, 'https://preview.redd.it/aonrlowt39b61.jpg?auto=webp&s=ef2605e6e3a0c5373fecc3126d01940dae70929b')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="valila.php">ดูรายละเอียด</a></button>
            </div>
            <div class="cake-item" data-name="CoCO Cake" data-price="300" id="5">
                <img src="https://i.pinimg.com/736x/ac/7e/b0/ac7eb0b97a4b554491efd82ba5aa2bf3.jpg" alt="CoCO Cake">
                <div class="cake-details">
                    <p class="cake-price">CoCO Cake     300 บ.</p>
                    <button class="order-btn" onclick="addToCart('CoCO Cake', 300, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFVjbjFv1yHZ-aXUnqyr_jsImj6qAjVOCC57aGAFQPSqVhcSlvL2arBgN-R4ASZGyGwDU&usqp=CAU')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="coco.php">ดูรายละเอียด</a></button>
            </div>
            <div class="cake-item" data-name="Orange Cake" data-price="300" id="6">
                <img src="https://i.pinimg.com/736x/0d/ed/ba/0dedba3896d160768acc364d082926ce.jpg" alt="เค้กวินลา">
                <div class="cake-details">
                    <p class="cake-price">Orange Cake     300 บ.</p>
                    <button class="order-btn" onclick="addToCart('Orange Cake', 300, 'https://i.pinimg.com/736x/0d/ed/ba/0dedba3896d160768acc364d082926ce.jpg')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="orange.php">ดูรายละเอียด</a></button>
            </div>
            <div class="cake-item" data-name="Buberry Cake" data-price="650" id="7">
                <img src="https://i.pinimg.com/736x/86/df/cb/86dfcb89446c7694b57eae6371986a01.jpg " alt="เค้กวินลา">
                <div class="cake-details">
                    <p class="cake-price">Buberry Cake     650 บ.</p>
                    <button class="order-btn" onclick="addToCart('Buberry Cake', 650, 'https://i.pinimg.com/736x/0d/ed/ba/0dedba3896d160768acc364d082926ce.jpg')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="blueberry.php">ดูรายละเอียด</a></button>
            </div>
            <div class="cake-item" data-name="All friuts Cake" data-price="600" id="8">
                <img src="https://i.pinimg.com/736x/99/8f/c0/998fc0772a1ccca2a3af3b25b26cdf84.jpg  " alt="เค้กวินลา">
                <div class="cake-details">
                    <p class="cake-price">Mix friuts Cake     600 บ.</p>
                    <button class="order-btn" onclick="addToCart('All friuts Cake', 600, 'https://i.pinimg.com/736x/0d/ed/ba/0dedba3896d160768acc364d082926ce.jpg')">ใส่ตะกร้า</button>
                </div>
                <button class="detell" onclick="or('#', 0)"><a href="allfruit.php">ดูรายละเอียด</a></button>
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