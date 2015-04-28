"打开语法高亮
syntax on 

"打开文件类型自动检测功能
filetype on

"配置颜色方案
colorscheme desert "desert murphy

"配色方案
"colorscheme koehler "设置配色方案

"注释颜色
"hi Comment guifg=#999999
""常量颜色
"hi Constant guifg=#CD00CD
""#E00CE0
""hi Identifier guifg=#0000CD
""while for等颜色
"hi Statement guifg=#BF2624
""关键词类型颜色
"hi Type guifg=#00CD00
""guibg=#39CB39
""转义后字符颜色
"hi Special guifg=#FB0C4B
""include宏等的颜色
"hi PreProc guifg=#0000CD
""guibg=#0000FF
""搜索匹配的颜色
"hi Search guifg=#FFFFFF guibg=#BF2624
""guibg为背景颜色，guifg为普通字体颜色
"hi Normal guifg=#000000 guibg=#F8F8DB
""行号的颜色
"hi LineNr guifg=#BD871D
""光标的颜色
"hi Cursor guibg=#000000
""状态栏的颜色
"hi StatusLine guifg=#00FF00
"hi StatusLineNC guifg=#33FF33
""""""""""""""""""""""""""""

"设置鼠标运行模式为WINDOWS模式 
"source $VIMRUNTIME/vimrc_example.vim
"source $VIMRUNTIME/mswin.vim 
"behave mswin

" 在所有模式下都允许使用鼠标，还可以是n,v,i,c等
set mouse=a
"set selection=exclusive
"set selectmode=mouse,key

"换行时,交错使用4个空格
set shiftwidth=4

"一个tab是4个字符 
set tabstop=4

"按一次tab前进4个字符 
set softtabstop=4

"在光标接近底端或顶端时,自动下滚或上滚. 
set scrolloff=6

"设置命令行的高度 
set cmdheight=1

"设置显示状态栏
"set laststatus=2

"设置退格键可用
set backspace=2

"设置命令历史行数 
set history=50

"用空格代替tab 
set expandtab 

"智能对齐方式 
set smartindent 

"设置C语言对齐方式
set cindent

"设置自动对齐
set autoindent

"自动切换当前目录为当前文件所在的目录 
"set autochdir 

"自动重新加载外部修改内容 
"set autoread 

"设定文件浏览器目录为当前目录 
set bsdir=buffer 

"显示行号
set number

"打开光标的行列位置显示功能 
"set ruler

"行高亮 
"set cursorline 

"列高亮，与函数列表有冲突 
"set cursorcolumn 

"设置不自动备份
set nobackup

"是否兼容VI，compatible为兼容，nocompatible为不完全兼容 
set nocompatible

"设置自动去掉BOM头
"set nobomb

"搜索忽略大小写 
set ignorecase

"高亮搜索的关键字
set hlsearch

"增量查找 实时匹配
set incsearch

"不要闪烁 
"set novisualbell 

"在输入括号时光标会短暂地跳到与之相匹配的括号处，不影响输入 
set showmatch

"显示TAB健 
"set list
"set listchars=tab:>-,trail:- 
            
"使用中文帮助文档
set helplang=cn

"查看utf-8格式的帮助文档
set encoding=utf-8 

"支持打开的文件格式
set fileencodings=ucs-bom,utf-8,cp936,gb2312,gbk

"正确地处理中文字符的折行和拼接 
set formatoptions+=mM 

"共享剪贴板  
"set clipboard+=unnamed

"状态行颜色 
"highlight StatusLine guifg=SlateBlue guibg=Yellow 
"highlight StatusLineNC guifg=Gray guibg=White 


" 带有如下符号的单词不要被换行分割
set iskeyword+=_,@,%

" 字符间插入的像素行数目
"set linespace=0

"设置状态行的内容
set statusline=%F%m%r%h%w\ [Column=%c]\ [Line=%l]\ %{strftime('%Y-%m-%d\ %H:%M:%S')}%=[FORMAT=%{&ff}]\ [TYPE=%Y]\ [%o-]\ [%p%%]\ 
"设置在状态行显示的信息如下：
" %F 当前文件名
" %m 当前文件修改状态
" %r 当前文件是否只读
" %Y 当前文件类型
" %{&fileformat} 当前文件编码
" %b 当前光标处字符的ASCII码值
" %B 当前光标处字符的十六进制值
" %l 当前光标行号
" %c 当前光标列号
" %V 当前光标虚拟列号(根据字符所占字节数计算)
" %p 当前行占总行数的百分比
" %% 百分号
" %L 当前文件总行数

"PHP
"使PHP识别EOT字符串 
hi link phpheredoc string 

"set foldmethod=marker
"let php_baselib = 1
"let php_htmlInStrings = 1
"let php_noShortTags = 1
"let php_folding = 1
"set foldcolumn=1
"set foldlevel=100
"nnoremap <space> @=((foldclosed(line('.')) < 0) ? 'zc' : 'zo')<CR>
