    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copy-right">
                        <p class="float-right">&copy; <?= date('Y'); ?> <a href="https://www.facebook.com/creasoftcorp">Shamir Tano M</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    {{-- End footer --}}

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- Scripts --}}
    @yield('scripts')
</body>
</html>
