// File: resources/js/types.d.ts
declare module "@inertiajs/vue3" {
    interface PageProps {
      auth: {
        user: Record<string | symbol, unknown> | null;
      };
    }
  }
  