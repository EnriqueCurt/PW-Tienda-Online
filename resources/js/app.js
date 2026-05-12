import './bootstrap';

console.log('App JS initialized');

document.addEventListener('livewire:navigated', () => {
    console.log('Livewire navigated');
});
