import axios from 'axios';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
//axios.defaults.headers.common['Authorization'] = `Bearer ${AuthUser.get().api_token}`;
axios.defaults.headers.common['Content-Type'] = 'application/json';
axios.defaults.headers.common['Accept'] = 'application/json';

export default axios;
