@php
    $directUrl = $survey->accessUrl();
    $qrApiUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($directUrl);
    $downloadUrl = route('admin.chat-access.qr-code.download', [
        'survey' => $survey->slug,
        'code' => $survey->access_code,
    ]);
@endphp

<div x-data="{
    copiedLink: false,
    copiedCode: false,
    copy(text, type) {
        navigator.clipboard.writeText(text);
        if (type === 'link') {
            this.copiedLink = true;
            setTimeout(() => this.copiedLink = false, 2500);
        } else {
            this.copiedCode = true;
            setTimeout(() => this.copiedCode = false, 2500);
        }
    }
}" style="padding: 0.5rem;">
    <div style="display: flex; flex-direction: row; flex-wrap: wrap; gap: 1.5rem; align-items: flex-start; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 1rem; padding: 1.25rem;">
        
        {{-- QR Code Image Box --}}
        <div style="flex-shrink: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 0.75rem; padding: 0.75rem; text-align: center;">
            <img src="{{ $qrApiUrl }}" alt="Survey Access QR Code" style="width: 180px; height: 180px; max-width: 180px; max-height: 180px; object-fit: contain; border-radius: 0.375rem; display: block;">
            <span style="display: block; margin-top: 0.5rem; font-size: 0.75rem; color: #64748b; font-family: monospace;">Scan to enter survey</span>
        </div>

        {{-- Details & Actions --}}
        <div style="flex: 1 1 280px; display: flex; flex-direction: column; gap: 0.875rem;">
            <div>
                <div style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; background: #f3e8ff; color: #7e22ce; margin-bottom: 0.375rem;">
                    <span>Survey:</span>
                    <strong>{{ $survey->name }}</strong>
                </div>
                <h4 style="margin: 0; font-size: 1rem; font-weight: 700; color: #0f172a; line-height: 1.3;">
                    Scan or Share to Enter Directly
                </h4>
                <p style="margin: 0.25rem 0 0; font-size: 0.75rem; color: #64748b; line-height: 1.4;">
                    Participants who scan this QR code or click the direct link will bypass the password prompt and go directly into this survey.
                </p>
            </div>

            {{-- Access Code Display --}}
            <div>
                <label style="display: block; font-size: 0.75rem; font-weight: 600; color: #475569; margin-bottom: 0.25rem;">
                    Access Password / Secret
                </label>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span style="font-family: monospace; font-size: 0.875rem; font-weight: 700; padding: 0.35rem 0.65rem; border-radius: 0.5rem; background: #f1f5f9; border: 1px solid #cbd5e1; color: #0f172a; letter-spacing: 0.05em;">
                        {{ $survey->access_code ?? 'None' }}
                    </span>
                    <button type="button" @click="copy(@js($survey->access_code), 'code')"
                            style="padding: 0.35rem 0.65rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600; background: #e2e8f0; border: none; color: #334155; cursor: pointer; transition: background 0.2s;">
                        <span x-show="!copiedCode">Copy Code</span>
                        <span x-show="copiedCode" style="color: #16a34a; font-weight: 700;">Copied!</span>
                    </button>
                </div>
            </div>

            {{-- Direct Access URL --}}
            <div>
                <label style="display: block; font-size: 0.75rem; font-weight: 600; color: #475569; margin-bottom: 0.25rem;">
                    Direct Link
                </label>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <input type="text" readonly value="{{ $directUrl }}"
                           style="width: 100%; font-family: monospace; font-size: 0.75rem; padding: 0.4rem 0.6rem; border-radius: 0.5rem; background: #f8fafc; border: 1px solid #cbd5e1; color: #1e293b;"
                           onclick="this.select()">
                    <button type="button" @click="copy(@js($directUrl), 'link')"
                            style="flex-shrink: 0; padding: 0.4rem 0.65rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600; background: #e2e8f0; border: none; color: #334155; cursor: pointer; transition: background 0.2s;">
                        <span x-show="!copiedLink">Copy Link</span>
                        <span x-show="copiedLink" style="color: #16a34a; font-weight: 700;">Copied!</span>
                    </button>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div style="display: flex; flex-wrap: wrap; gap: 0.625rem; align-items: center; margin-top: 0.25rem;">
                <a href="{{ $downloadUrl }}"
                   style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0.875rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 700; background: #7c3aed; color: #ffffff; text-decoration: none; box-shadow: 0 1px 2px rgba(0,0,0,0.05); transition: background 0.2s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" style="width: 16px; height: 16px; min-width: 16px; min-height: 16px; display: inline-block;">
                        <path fill-rule="evenodd" d="M10 3a.75.75 0 0 1 .75.75v10.638l3.96-4.158a.75.75 0 1 1 1.08 1.04l-5.25 5.5a.75.75 0 0 1-1.08 0l-5.25-5.5a.75.75 0 1 1 1.08-1.04l3.96 4.158V3.75A.75.75 0 0 1 10 3Z" clip-rule="evenodd" />
                    </svg>
                    <span>Download QR Code PNG</span>
                </a>

                <a href="{{ $directUrl }}" target="_blank"
                   style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 0.75rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600; background: #ffffff; color: #334155; text-decoration: none; border: 1px solid #cbd5e1; transition: background 0.2s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" style="width: 16px; height: 16px; min-width: 16px; min-height: 16px; display: inline-block;">
                        <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z" clip-rule="evenodd" />
                    </svg>
                    <span>Open Survey</span>
                </a>
            </div>
        </div>
    </div>
</div>
