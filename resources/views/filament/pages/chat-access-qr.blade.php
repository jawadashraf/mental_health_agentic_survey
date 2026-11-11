@php
    $currentCode = $code ?? app(\App\Settings\ChatSettings::class)->access_code;
    $raftUrl = route('raft-chat', ['access_code' => $currentCode]);
    $raftTestUrl = route('raft-chat', ['mode' => 'test', 'access_code' => $currentCode]);
    $chatUrl = route('chat', ['access_code' => $currentCode]);
@endphp

<div x-data="{
    target: @js($defaultTarget ?? 'raft'),
    code: @js($currentCode),
    copied: false,
    urls: {
        raft: @js($raftUrl),
        test: @js($raftTestUrl),
        chat: @js($chatUrl),
    },
    get currentUrl() {
        const base = this.target === 'test'
            ? @js(route('raft-chat', ['mode' => 'test']))
            : (this.target === 'chat' ? @js(route('chat')) : @js(route('raft-chat')));
        const separator = base.includes('?') ? '&' : '?';
        return `${base}${separator}access_code=${encodeURIComponent(this.code)}`;
    },
    get qrImage() {
        return `https://api.qrserver.com/v1/create-qr-code/?size=260x260&data=${encodeURIComponent(this.currentUrl)}`;
    },
    get downloadUrl() {
        return `{{ route('admin.chat-access.qr-code.download') }}?target=${this.target}&code=${encodeURIComponent(this.code)}`;
    },
    copyLink() {
        navigator.clipboard.writeText(this.currentUrl);
        this.copied = true;
        setTimeout(() => this.copied = false, 2500);
    }
}" style="display: flex; flex-direction: column; gap: 1.25rem;">
    {{-- Target selector --}}
    <div>
        <label style="display: block; font-size: 0.875rem; font-weight: 700; color: #0f172a; margin-bottom: 0.5rem;">
            Select Survey Destination
        </label>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 0.75rem;">
            <button type="button" @click="target = 'raft'"
                    :style="target === 'raft'
                        ? 'border: 2px solid #7c3aed; background: #f5f3ff; color: #5b21b6;'
                        : 'border: 1px solid #cbd5e1; background: #ffffff; color: #334155;'"
                    style="padding: 0.75rem; border-radius: 0.75rem; text-align: left; cursor: pointer; transition: all 0.2s;">
                <span style="display: block; font-size: 0.65rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: #7c3aed;">Live Survey</span>
                <span style="font-size: 0.875rem; font-weight: 600;">Raft Foster Care</span>
            </button>

            <button type="button" @click="target = 'test'"
                    :style="target === 'test'
                        ? 'border: 2px solid #7c3aed; background: #f5f3ff; color: #5b21b6;'
                        : 'border: 1px solid #cbd5e1; background: #ffffff; color: #334155;'"
                    style="padding: 0.75rem; border-radius: 0.75rem; text-align: left; cursor: pointer; transition: all 0.2s;">
                <span style="display: block; font-size: 0.65rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: #d97706;">Testing Mode</span>
                <span style="font-size: 0.875rem; font-weight: 600;">Raft Test Survey</span>
            </button>

            <button type="button" @click="target = 'chat'"
                    :style="target === 'chat'
                        ? 'border: 2px solid #7c3aed; background: #f5f3ff; color: #5b21b6;'
                        : 'border: 1px solid #cbd5e1; background: #ffffff; color: #334155;'"
                    style="padding: 0.75rem; border-radius: 0.75rem; text-align: left; cursor: pointer; transition: all 0.2s;">
                <span style="display: block; font-size: 0.65rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: #64748b;">Standard</span>
                <span style="font-size: 0.875rem; font-weight: 600;">General Chat</span>
            </button>
        </div>
    </div>

    {{-- QR code & share info --}}
    <div style="display: flex; flex-direction: row; flex-wrap: wrap; gap: 1.5rem; align-items: flex-start; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 1rem; padding: 1.25rem;">
        {{-- QR Code Image Box --}}
        <div style="flex-shrink: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 0.75rem; padding: 0.75rem; text-align: center;">
            <img :src="qrImage" alt="Survey Access QR Code" style="width: 180px; height: 180px; max-width: 180px; max-height: 180px; object-fit: contain; border-radius: 0.375rem; display: block;">
            <span style="display: block; margin-top: 0.5rem; font-size: 0.75rem; color: #64748b; font-family: monospace;">Scan to access</span>
        </div>

        {{-- Details & Actions --}}
        <div style="flex: 1 1 280px; display: flex; flex-direction: column; gap: 0.875rem;">
            <div>
                <h4 style="margin: 0; font-size: 1rem; font-weight: 700; color: #0f172a; line-height: 1.3;">
                    Direct Survey Access Link & QR Code
                </h4>
                <p style="margin: 0.25rem 0 0; font-size: 0.75rem; color: #64748b; line-height: 1.4;">
                    Participants who scan this QR code or click this direct link bypass the manual password entry screen and start the survey directly.
                </p>
            </div>

            {{-- Link with copy button --}}
            <div>
                <label style="display: block; font-size: 0.75rem; font-weight: 600; color: #475569; margin-bottom: 0.25rem;">Direct Access URL</label>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <input type="text" readonly :value="currentUrl"
                           style="width: 100%; font-family: monospace; font-size: 0.75rem; padding: 0.4rem 0.6rem; border-radius: 0.5rem; background: #f8fafc; border: 1px solid #cbd5e1; color: #1e293b;"
                           onclick="this.select()">
                    <button type="button" @click="copyLink()"
                            style="flex-shrink: 0; padding: 0.4rem 0.65rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600; background: #e2e8f0; border: none; color: #334155; cursor: pointer; transition: background 0.2s;">
                        <span x-show="!copied">Copy Link</span>
                        <span x-show="copied" style="color: #16a34a; font-weight: 700;">Copied!</span>
                    </button>
                </div>
            </div>

            {{-- Download & Share buttons --}}
            <div style="display: flex; flex-wrap: wrap; gap: 0.625rem; align-items: center; margin-top: 0.25rem;">
                <a :href="downloadUrl"
                   style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0.875rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 700; background: #7c3aed; color: #ffffff; text-decoration: none; box-shadow: 0 1px 2px rgba(0,0,0,0.05); transition: background 0.2s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" style="width: 16px; height: 16px; min-width: 16px; min-height: 16px; display: inline-block;">
                        <path fill-rule="evenodd" d="M10 3a.75.75 0 0 1 .75.75v10.638l3.96-4.158a.75.75 0 1 1 1.08 1.04l-5.25 5.5a.75.75 0 0 1-1.08 0l-5.25-5.5a.75.75 0 1 1 1.08-1.04l3.96 4.158V3.75A.75.75 0 0 1 10 3Z" clip-rule="evenodd" />
                    </svg>
                    <span>Download QR Code PNG</span>
                </a>

                <a :href="currentUrl" target="_blank"
                   style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 0.75rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600; background: #ffffff; color: #334155; text-decoration: none; border: 1px solid #cbd5e1; transition: background 0.2s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" style="width: 16px; height: 16px; min-width: 16px; min-height: 16px; display: inline-block;">
                        <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z" clip-rule="evenodd" />
                    </svg>
                    <span>Open Survey in New Tab</span>
                </a>
            </div>
        </div>
    </div>
</div>
