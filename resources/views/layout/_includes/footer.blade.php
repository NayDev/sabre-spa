                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
    <script src=" {{ asset('sabre-tema/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $(".datepicker").datepicker({ dateFormat: 'dd/mm/yy' });
        var credId={{(int)\Auth::id()}};
    </script>

    @hasSection ('javascript')
        @yield('javascript')       
    @endif
    </body>
</html>