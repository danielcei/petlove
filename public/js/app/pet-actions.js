export default function() {
    Livewire.on('trigger-filament-action', (data) => {
        const componentName = data.component.includes('resource')
            ? `${data.component}.pages.${this.getPage()}`
            : data.component;

        window.dispatchEvent(new CustomEvent('call-action', {
            detail: {
                component: componentName,
                name: data.name,
                arguments: [data.recordId],
                panel: data.panel
            }
        }));
    });
}
