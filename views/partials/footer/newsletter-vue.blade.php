<div class="mailchimp">
    <h4>{!! trans('themes::theme.footer.event newsletter') !!}</h4>
    <div class="mailchimp-form" id="newsletter">
        {!! Form::open(['v-on:submit'=>'subscribe', 'method'=>'post', 'class'=>'form-inline']) !!}
        <div class="form-group">
            <input placeholder="{{ trans('themes::theme.newsletter.name') }}" value="" type="text" name="name" v-bind:class="errors.name ? 'has-error' : ''" class="input-text required" v-model="name">
            <span v-if="errors.name" class="help-block has-error">@{{ errors.name[0] }}</span>
        </div>
        <div class="form-group">
            <input placeholder="{{ trans('themes::theme.newsletter.email') }}" type="text" name="email" v-bind:class="errors.email ? 'has-error' : ''" class="input-text required email" v-model="email">
            <span v-if="errors.email" class="help-block has-error">@{{ errors.email[0] }}</span>
            <span v-if="errors.EMAIL" class="help-block has-error">@{{ errors.EMAIL[0] }}</span>
        </div>
            <button class="awe-btn">{{ trans('themes::theme.newsletter.button') }}</button>
         {!! Form::close() !!}
        @push('js-inline')
            {!! Theme::script('js/lib/vue.min.js') !!}
            {!! Theme::script('js/lib/axios.min.js') !!}
            <script>
                @if(App::environment()=='local')
                    Vue.config.devtools = true;
                @endif
                window.axios.defaults.headers.common['X-CSRF-TOKEN']     = '{{ csrf_token() }}';
                window.axios.defaults.headers.common['Cache-Control']    = 'no-cache';
                new Vue({
                    el: '#newsletter',
                    data: {
                        route: '{{ route('api.newsletter.subscribe') }}',
                        name: '',
                        email: '',
                        errors: {}
                    },
                    methods: {
                        subscribe: function(e) {
                            e.preventDefault();
                            axios.post(this.route, this.$data)
                                .then(response => {
                                    if(response.data.status === false) {
                                        alert('{{ trans('newsletter::subscribers.messages.subscriber already registered') }}');
                                    } else {
                                        alert('{{ trans('newsletter::subscribers.messages.subscriber success') }}');
                                    }
                                })
                                .catch(error => this.errors = error.response.data);
                        }
                    }
                });
            </script>
        @endpush
        @push('css-inline')
            <style>
                .has-error {
                    border-color: red !important;
                    color: red !important;
                }
                .has-error::placeholder {
                    color: red !important;
                }
            </style>
        @endpush
    </div>
</div>