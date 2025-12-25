import './bootstrap';
import Alpine from 'alpinejs';
import { Chart, registerables } from 'chart.js';

// Register Chart.js
Chart.register(...registerables);

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Make Chart available globally
window.Chart = Chart;
