import axios from "axios";

const axiosInstance = axios.create({
    baseURL: 'http://localhost:85',
    timeout: 3000,
});

export default axiosInstance;