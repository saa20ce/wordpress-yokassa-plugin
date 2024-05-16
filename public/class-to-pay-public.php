<?php

class ToPayPublic {
    
    public function display_payment_form() {
        ob_start();
        ?>
        <form id="payment-form" class="payment-form">
            <!-- Поля формы оплаты -->
            <input type="text" name="amount" placeholder="Enter amount to pay">
            <button type="submit" class="payment-button">Оплатить сейчас</button>
        </form>
        <div class="payment-success-message" style="display:none;">Оплата прошла успешно!</div>
        <div class="payment-error-message" style="display:none;">Платеж не прошел. Пожалуйста, попробуйте еще раз.</div>
        <?php
        return ob_get_clean();
    }
    
}