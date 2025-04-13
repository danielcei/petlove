<div class="space-y-1">
    <div class="font-medium text-sm text-gray-900 dark:text-gray-100">
        {{ $user->name }}
    </div>

    <div class="text-sm text-gray-600 dark:text-gray-400">
        📞 {{ $user->telephone ?? 'Sem telefone' }}
    </div>

    <div class="text-sm text-gray-600 dark:text-gray-400">
        ✉️ {{ $user->email }}
    </div>
</div>
