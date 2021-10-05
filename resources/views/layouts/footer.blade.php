<footer class="footer">
    <div class="footer-wrapper">
        <div class="footer-contacts">
            <address class="footer-addr">@lang('app.contacts.city')@lang('app.contacts.street')</address>
            <div class="contact-container">
                <a href="https://facebook.com" target="_blank" class="facebook-gray fb-gray"></a>
                <a href="tel:@lang('app.contacts.tel')" class="footer-tel">@lang('app.contacts.tel')</a>
            </div>
            <a href="mailto:@lang('app.contacts.email')" class="email">@lang('app.contacts.email')</a>
        </div>
        <p class="footer-inform">
            {{ '@' . now()->format('Y') }} @lang('app.layout.footer.promo')
        </p>
    </div>
</footer>
